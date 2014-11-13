#ifndef _ARGUMENTS
#define _ARGUMENTS

#include "winlib.h"

using namespace std;

//Argument class
class argument{
protected:
	string textBody;
public:
	//Constructors and deconstructors
	argument(){};
	argument(string);
	~argument(){};
	//Gets
	string getTextBody();
	//Sets
	bool setTextBody(string);
};

//Class: argument, constructor with string for text body
argument::argument(string text){
	textBody = text;
}

//Class: argument, get text body
string argument::getTextBody(){
	return textBody;
}

//Class: argument, set text body with a string
bool argument::setTextBody(string text){
	textBody = text;

	return 0;
}



//Controlled experiment argument class
class ctrlExp : public argument{
	// 0 = noCorrelation, 1 = negativeCorrelation, 2 = positiveCorrelation
	int correlation = 0;
public:
	//Constructors and deconstructors
	ctrlExp(){};
	ctrlExp(string);
	~ctrlExp(){};
	//Gets
	int getCorr();
	//Sets
	bool setCorr(int);
};

//Class: controlled experiment argument, constructor with string for text body
ctrlExp::ctrlExp(string text){
	textBody = text;
}

//Class: controlled experiment argument, get correlation
int ctrlExp::getCorr(){
	return correlation;
}

//Class: controlled experiment argument, set correlation
bool ctrlExp::setCorr(int num){
	correlation = num;

	return 0;
}



//Opinion argument class
class opinion : public argument{
public:
	//Constructors and deconstructors
	opinion(){};
	opinion(string);
	~opinion(){};
};

//Class: opinion argument, constructor with string for text body
opinion::opinion(string text){
	textBody = text;
}

#endif