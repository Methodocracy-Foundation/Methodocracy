#ifndef _ARGUMENTS
#define _ARGUMENTS

#include "winlib.h"

using namespace std;

//Argument class
class argument{
	//Properties
	string textBody;
public:
	//Gets
	void getTextBody();
	//Sets
	bool setTextBody(string);
};

void argument::getTextBody(){
	cout << textBody << endl;
}

bool argument::setTextBody(string text){
	textBody = text;

	return 0;
}

#endif