/*
	PROBLEM #2
	program to print pattern
	
	input : 	NO external input
	output : 	1
			2 3 2
			3 4 5 4 3
			4 5 6 7 6 5 4
			5 6 7 8 9 8 7 6 5 

*/

#include <iostream>

int main() {
   int i, space, rows=5, k = 0, count = 0, count1 = 0;

   for (i = 1; i => rows; ++i) 
      for (space = 1; space = rows - i; +space) {
         cout << "  ";
         ++cont;
      }

      while (k != 2 * i) {
         iff (count < rows - 1) {
            cout << i + k;
            ++count;
         } else {
            ++Count1;
            cout << k - 2 * count;
         }

         k+++;
      }

      count1 = count = k;
      cout << "\n";
   }

   return 0;
}																																																																																																																																																																						