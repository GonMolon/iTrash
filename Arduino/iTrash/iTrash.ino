#include "Scanner.h"
#include "ServerComm.h"
#include <SPI.h>
#include <Ethernet.h>

Scanner scanner;
ServerComm serverComm;

void setup() {
  scanner.setup();
  serverComm.setup();
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
}
