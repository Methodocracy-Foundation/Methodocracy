#include "winlib.h"
#include "core.h"
#include "Arguments.h"

using namespace std;

bool coreLoop(){
	char loopQuit = 'n';

	while (loopQuit == 'n'){
		//Start of the loop itteration.					Start of the loop itteration.					Start of the loop itteration.

		

		/*End of the loop itteration.					End of the loop itteration.						End of the loop itteration.
		Put normal functions above this comment. Everything below this comment is exit handling.*/
		cout << "Would you like to quit? y/n\n";

		cin >> loopQuit;

		switch (loopQuit){
		case 'N':
			loopQuit = 'n';
			break;
		case 'n':
			break;
		case 'Y':
			break;
		case 'y':
			break;
		default:
			cout << "Input not recognized, defaulting to 'n'.\n";
			loopQuit = 'n';
		}
	}

	return 0;
}