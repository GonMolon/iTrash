#ifndef DOOR_CONTROL_
#define DOOR_CONTROL_

#include <Arduino.h>
#include <Servo.h>

//Bisagra derecha,    pin 8
//Bisagra izquierda,  pin 9
class DoorControl {
  private:
  
    Servo left;
    Servo right;
  
  public:
  
    DoorControl();
  
    void open();
    
    void close();
};

#endif
