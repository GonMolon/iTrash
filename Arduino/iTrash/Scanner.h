#include <Arduino.h>

class Scanner {
private:
    int result;
public:
    Scanner();
    void setup();
    bool refresh();
    int get_result() const;
};
