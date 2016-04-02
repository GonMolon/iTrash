#include "Scanner.h"

Scanner::Scanner() {

}

void Scanner::setup() {
    Serial.begin(9600);
    Serial1.begin(9600);
}

bool Scanner::refresh() {
    if (Serial1.available()) {
        result = Serial1.read();
        Serial.write(result);
    }
}

int Scanner::get_result() const {
    return result;
}
