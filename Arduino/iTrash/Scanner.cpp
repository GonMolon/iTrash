#include "Scanner.h"

Scanner::Scanner() {

}

void Scanner::setup() {
    Serial1.begin(9600);
}

bool Scanner::refresh() {
    if(Serial1.available()) {
        int i = 0;
        while(i < 49 && Serial1.available()) {
            barcode[i] = Serial1.read();
            ++i;
            delay(10);
        }
        barcode[i-1] = '\0';
        Serial.println(barcode);
        return true;
    } else {
        return false;
    }
}

const char* Scanner::get_barcode() const {
    return barcode;
}
