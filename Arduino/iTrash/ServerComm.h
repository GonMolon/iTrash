#ifndef SERVER_COMM_
#define SERVER_COMM_

#include <SPI.h>
#include <Ethernet.h>
#include "Arduino.h"

class ServerComm {
  private:
    byte MAC[6] = {0x00, 0xAA, 0xBB, 0x22, 0xBA, 0x54};
    char serverName[64];
    char pageName[64];
    int serverPort = 80;
    EthernetClient client;
    byte postPage(char* domainBuffer,int thisPort,char* page,char* thisData);
    
  public:

    ServerComm();

    //Make post request with data postData. Returns 1 on succes.
    bool post(char* postData);

    //Close connection
    void close();
    
    void setup(char* url);
    
    void sendId(char* id);
};

#endif
