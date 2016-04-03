#include "ServerComm.h"
#include "Arduino.h"


ServerComm::ServerComm() {
}

void ServerComm::setup() {
    Ethernet.begin(mac);
}

bool ServerComm::sendId(const char* id) {
  client.stop();
  char buffer[50];
  sprintf(buffer, "GET /iTrash/%s/ HTTP/1.0", id);
  if(client.connect(server, serverPort)) {
    Serial.println("connected");
    client.println(buffer);
    Serial.println(buffer);
    client.println("Connection: close");
    client.println();
    return true;
  } else {
    Serial.println("connection failed");
    return false;
  }
}
