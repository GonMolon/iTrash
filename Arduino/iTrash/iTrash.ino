#include "Scanner.h"
#include "ServerComm.h"
#include "ProximitySensor.h"
#include "DoorControl.h"
#include <SPI.h>
#include <Ethernet.h>

#define MIN_DIST 16

Scanner scanner;
ServerComm serverComm;
ProximitySensor prox_cerc(13, 12);
ProximitySensor prox_trash(11, 10);
DoorControl door;

bool trash_open = false;

void setup() {
  Serial.begin(9600);
  scanner.setup();
  serverComm.setup("192.168.77.92:8080");
  door.close();
}

void loop() {
  if(scanner.refresh()) {
    bool post_result = serverComm.sendId(scanner.get_barcode());
    if(post_result) {
      Serial.println("Sent");
    } else {
      Serial.println("Fail");
    }
  }
  if(read() <= MIN_DIST && !trash_open) {
      door.open();
  }
  if(read() > MIN_DIST && trash_open) {
      door.close();
  }
}
