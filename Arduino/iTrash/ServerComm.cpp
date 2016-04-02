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
  sprintf(buffer, "/iTrash/%s/", id);
  if(client.connect(server, serverPort)) {
    Serial.println("connected");
    client.println("GET /iTrash/1/ HTTP/1.0");
    client.println("Connection: close");
    client.println();
    return true;
  } else {
    Serial.println("connection failed");
    return false;
  }
}
