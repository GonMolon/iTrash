#ifndef PROXIMITY_SENSOR
#define PROXIMITY_SENSOR

#include <Arduino.h>

class ProximitySensor {
private:
    int trigger_pin;
    int echo_pin;
public:
    ProximitySensor(int trigger_pin, int echo_pin);
    int read() const;
};

#endif
