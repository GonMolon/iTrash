#include <Arduino.h>

class Scanner {
private:
    char barcode[50];
public:
    Scanner();
    void setup();
    bool refresh();
    const char* get_barcode() const;
};
