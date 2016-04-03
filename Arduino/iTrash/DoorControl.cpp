#include "DoorControl.h"

DoorControl::DoorControl() {
  left.attach(9);
  left.attach(8);
}

void DoorControl::open() {
  //left.write(170);
  //right.write(0);
}

void DoorControl::close() {
  //left.write(0);
  //right.write(170);
}
