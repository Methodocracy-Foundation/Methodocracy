#include "winlib.h"
#include "core.h"

using namespace std;

//Application entry
int main(){
	coreLoop();
	//Remember: all normal high level funcions go in the core loop

	//Error check before application exit
	return 0;
}
//Application exit