#ifndef SCANNER
#define SCANNER

#include <Arduino.h>

class Scanner {
private:
    char barcode[50];
    void convert_result(int result);
public:
    Scanner();
    void setup();
    bool refresh();
    const char* get_barcode() const;
};

#endif
