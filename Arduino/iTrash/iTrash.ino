#include "Scanner.h"
#include "ServerComm.h"
#include "ProximitySensor.h"
#include "DoorControl.h"
#include <SPI.h>
#include <Ethernet.h>
#include <Servo.h>

#define MIN_LIGHT 930
#define TRASH_LEVEL_2 20
#define TRASH_LEVEL_3 15

Scanner scanner;
ServerComm serverComm;
ProximitySensor prox_trash(6, 7);
DoorControl door;

bool trash_open = false;

void setup() {
  Serial.begin(9600);
  scanner.setup();
  serverComm.setup();
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
    int light = analogRead(A0);
    if(light <= MIN_LIGHT && !trash_open) {
        Serial.println("open door");
        door.open();
        trash_open = true;
    }
    if(light > MIN_LIGHT && trash_open) {
        Serial.println("open closed");
        door.close();
        trash_open = false;
    }
    if(!trash_open) {
        int level = 1;
        int trash = prox_trash.read();
        if(trash < TRASH_LEVEL_3) {
            level = 3;
        } else if(trash < TRASH_LEVEL_2) {
            level = 2;
        }
        for(int i = 0; i < 3; ++i) {
            if(i+1 == level) {
                digitalWrite(32+i*6, HIGH);
            } else {
                digitalWrite(32+i*6, LOW);
            }
        }
    }
    delay(500);
}
