#include "Scanner.h"
#include "ServerComm.h"
#include "ProximitySensor.h"
#include "DoorControl.h"
#include <SPI.h>
#include <Ethernet.h>
#include <Servo.h>

#define MIN_DIST 16
#define TRASH_LEVEL_2 20
#define TRASH_LEVEL_3 5

Scanner scanner;
ServerComm serverComm;
ProximitySensor prox_cerc(13, 12);
ProximitySensor prox_trash(11, 10);
DoorControl door;

bool trash_open = false;

void setup() {
  Serial.begin(9600);
  scanner.setup();
  serverComm.setup("http://192.168.77.92:8080/iTrash/");
  door.close();
  for(int i = 0; i < 3; ++i) {
      pinMode(32+i*6, OUTPUT);
      pinMode(32+i*6+1, OUTPUT);
      digitalWrite(32+i*6, HIGH);
      digitalWrite(32+i*6+1, LOW);
  }
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
  if(prox_cerc.read() <= MIN_DIST && !trash_open) {
      door.open();
  }
  if(prox_cerc.read() > MIN_DIST && trash_open) {
      door.close();
  }
  if(!trash_open) {
      int level = 1;
      int trash = prox_trash.read();
      Serial.println(trash);
      if(trash < TRASH_LEVEL_3) {
          level = 3;
      } else if(trash < TRASH_LEVEL_2) {
          level = 2;
      }
      Serial.print("level: ");
      Serial.println(level);
      for(int i = 0; i < 3; ++i) {
          if(i+1 == level) {
              digitalWrite(32+i*6, HIGH);
          } else {
              digitalWrite(32+i*6, LOW);
          }
      }
  }
  delay(50);
}
