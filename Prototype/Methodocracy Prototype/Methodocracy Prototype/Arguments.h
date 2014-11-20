#ifndef _ARGUMENTS
#define _ARGUMENTS

#include "winlib.h"

using namespace std;



//New id counter class
class NewIdCounter{
	unsigned long long int counter = 0;
public:
	//Constructors and deconstructors
	NewIdCounter(){};
	~NewIdCounter(){};
	//Gets
	unsigned long long int newId();
	// ! get without ++ for testing !
	unsigned long long int id(){ return counter; };
	// ! end testing				!
} newIdCounter;

//Class: new id counter, get new id and increase counter
unsigned long long int NewIdCounter::newId(){
	counter++;
	return counter;
}


//Database class
class Database{
	
public:
	//Constructors and deconstructors
	Database();
	~Database();
};



//Argument class
class Argument{
protected:
	string textTitle;
	string textBody;
	unsigned long long int id;
public:
	//Constructors and deconstructors
	Argument();
	Argument(string,string);
	~Argument(){};
	//Gets
	string getTextTitle();
	string getTextBody();
	//Sets
	bool setTextTitle(string);
	bool setTextBody(string);
};

//Class: argument, constructor
Argument::Argument(){
	id = newIdCounter.newId();
}

//Class: argument, constructor with string for text body and text title
Argument::Argument(string title,string body){
	textTitle = title;
	textBody = body;
	id = newIdCounter.newId();
}

//Class: argument, get text title
string Argument::getTextTitle(){
	return textTitle;
}

//Class: argument, get text body
string Argument::getTextBody(){
	return textBody;
}

//Class: argument, set text title with a string
bool Argument::setTextTitle(string title){
	textTitle = title;

	return 0;
}

//Class: argument, set text body with a string
bool Argument::setTextBody(string body){
	textBody = body;

	return 0;
}



//Controlled experiment argument class
class CtrlExp : public Argument{
	// 0 = noCorrelation, 1 = negativeCorrelation, 2 = positiveCorrelation
	int correlation = 0;
public:
	//Constructors and deconstructors
	CtrlExp();
	CtrlExp(string,string);
	~CtrlExp(){};
	//Gets
	int getCorr();
	//Sets
	bool setCorr(int);
};

//Class: controlled experiment argument, constructor
CtrlExp::CtrlExp(){
	id = newIdCounter.newId();
}

//Class: controlled experiment argument, constructor with string for text body
CtrlExp::CtrlExp(string title, string body){
	textTitle = title;
	textBody = body;
	id = newIdCounter.newId();
}

//Class: controlled experiment argument, get correlation
int CtrlExp::getCorr(){
	return correlation;
}

//Class: controlled experiment argument, set correlation
bool CtrlExp::setCorr(int num){
	correlation = num;

	return 0;
}



//Opinion argument class
class Opinion : public Argument{
public:
	//Constructors and deconstructors
	Opinion();
	Opinion(string,string);
	~Opinion(){};
};

//Class: opinion argument, constructor
Opinion::Opinion(){
	id = newIdCounter.newId();
}

//Class: opinion argument, constructor with string for text body
Opinion::Opinion(string title, string body){
	textTitle = title;
	textBody = body;
	id = newIdCounter.newId();
}

#endif