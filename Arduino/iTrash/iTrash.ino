#include "Scanner.h"
#include "ServerComm.h"
#include "ProximitySensor.h"
#include <SPI.h>
#include <Ethernet.h>

#define MIN_DIST 16

Scanner scanner;
ServerComm serverComm;
ProximitySensor prox_cerc(13, 12);
ProximitySensor prox_trash(11, 10);

bool trash_open = false;

void setup() {
  Serial.begin(9600);
  scanner.setup();
  serverComm.setup("192.168.77.92:8080");
  close_
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
      open_trash();
  }
  if(read() > MIN_DIST && trash_open) {
      close_trash();
  }
}
