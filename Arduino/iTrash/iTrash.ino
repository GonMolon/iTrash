#include "ServerComm.h"

void setup() {
  Serial.begin(9600);
  ServerComm server("www.google.com", "");
  server.post("Hey");
}

void loop() {

}
