#include "winlib.h"
#include "core.h"

using namespace std;

//Application entry
int main(){
	coreLoop();
	//Remember: all normal and high level functions go in coreLoop
	
	//error check before application exit
	return 0;
}
//Application exit