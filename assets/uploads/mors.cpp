#include <iostream>
#include <sstream>
#include <map>

int main() {
    std::map<std::string, char> morseCode = {
        {".-", 'A'}, {"-...", 'B'}, {"-.-.", 'C'}, {"-..", 'D'}, {".", 'E'}, {"..-.", 'F'}, {"--.", 'G'},
        {"....", 'H'}, {"..", 'I'}, {".---", 'J'}, {"-.-", 'K'}, {".-..", 'L'}, {"--", 'M'}, {"-.", 'N'},
        {"---", 'O'}, {".--.", 'P'}, {"--.-", 'Q'}, {".-.", 'R'}, {"...", 'S'}, {"-", 'T'}, {"..-", 'U'},
        {"...-", 'V'}, {".--", 'W'}, {"-..-", 'X'}, {"-.--", 'Y'}, {"--..", 'Z'}, {"-----", '0'},
        {"----", '1'}, {"---", '2'}, {"--", '3'}, {"-", '4'}, {".", '5'}, {"..", '6'}, {"...", '7'},
        {"....", '8'}, {"----.", '9'}, {" /", ' '}
    };
        
    std::string morse = ".-- .... .- - / .... .- - .... / --. --- -.. / .-- .-. --- ..- --. .... -";
    std::string decoded;
    std::string symbol;
    std::istringstream stream(morse);
    
    while(stream >> symbol){
        if(morseCode.count(symbol) > 0){
            decoded += morseCode[symbol];
        }else{
            decoded += ' ';
        }
    }
    std::cout << decoded << std::endl;
    
    return 0;
}