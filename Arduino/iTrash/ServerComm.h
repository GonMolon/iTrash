#ifndef SERVER_COMM
#define SERVER_COMM

#include <SPI.h>
#include <Ethernet.h>
#include "Arduino.h"

class ServerComm {
  private:
    byte mac[6] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED};
    byte server[4] = {192, 168, 77, 92};
    int serverPort = 8080;
    EthernetClient client;
  public:
    ServerComm();
    void setup();
    bool sendId(const char* id);
};

#endif
