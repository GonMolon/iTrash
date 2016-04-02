#include "ProximitySensor.h"

ProximitySensor::ProximitySensor(int trigger_pin, int echo_pin) {
    pinMode(trigger_pin, OUTPUT);
    pinMode(echo_pin, INPUT);
    this->trigger_pin = trigger_pin;
    this->echo_pin = echo_pin;
}

long ProximitySensor::read() const {
    long duration, distance;
    digitalWrite(TRIGGER, LOW);
    delayMicroseconds(2);
    digitalWrite(TRIGGER, HIGH);
    delayMicroseconds(10);
    digitalWrite(TRIGGER, LOW);
    duration = pulseIn(ECHO, HIGH);
    distance = (duration/2) / 29.1;
    if(distance >= 200 || distance <= 0){
        Serial.println("Out of range");
        return -1;
    } else {
        Serial.print(distance);
        Serial.println(" cm");
        return distance;
    }
}
