#include "Scanner.h"
#include "ServerComm.h"
#include <SPI.h>
#include <Ethernet.h>

Scanner scanner;
ServerComm serverComm;

void setup() {
  scanner.setup();
  serverComm.setup("192.168.77.92:8080");
}

void loop() {
  if(scanner.refresh()) {
    byte post_result = serverComm.sendId(result);
    if(post_result == 1) {
      Serial.println("Sent");
    } else {
      Serial.println("Fail");
    }
  }
}
