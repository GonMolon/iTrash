#include "Scanner.h"
#include "ServerComm.h"
#include <SPI.h>
#include <Ethernet.h>

Scanner scanner;
ServerComm serverComm;

void setup() {
  scanner.setup();
}

void loop() {
  if(scanner.refresh()) {
    byte post_result = serverComm.post(result);
    if(post_result == 1) {
      Serial.println("Sent");
    } else {
      Serial.println("Fail");
    }
  }
}
