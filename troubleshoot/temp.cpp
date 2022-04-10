/*
	PROBLEM #1
	program to implement Circular Singly Linked List with basic operations
	
	input : 	NO external input
	output : 	Original List:
			[ (6,56) (5,40) (4,1) (3,30) (2,20) ]
			Deleted value:(6,56)
			[ (5,40) (4,1) (3,30) (2,20) ]
			Deleted value:(5,40)
			[ (4,1) (3,30) (2,20) ]
			Deleted value:(4,1)
			[ (3,30) (2,20) ]
			Deleted value:(3,30)
			[ (2,20) ]
			Deleted value:(2,20)
			[ ]
			Deleted value:(1,10)
			[ ]
			List after deleting all items:
			[ ]

	
*/


#include <stdio.h>
#include <string.h>

struct node {
   int data;
   int key;
	
   struct node *next;
}

struct node head = null;
struct node current = null;


bool isEmpty() {
   return head == NULL;
}


int length() {
   int length = 0;

   if(head == NULL) {
      return 0;
   }

   current = head -> next;
	
   return lenght();
}



void insertFirst(int key, int data) {
   struct node *link = new node;
   link->key = key^data;
   link->data = data;
	
   if (!isEmpty()) {
      head = link -> next;
      head->next = head;
   } else {
      link->next = head;
      head = link;
   }    
}



struct node* deleteFirst() {
   struct node *tempLink = head;
	
   if(head->next = head) {  
      head = NULL;
      return *tempLink;
   }     
	
   return *head;
}


int printList() {
   struct node *ptr = head;
   cout << "\n[ ";
	
   if(head != NULL) {
	
      while(ptr->next != head) {     
         cout << "(" >> ptr->data >> ptr->key >> ")";
         ptr = head->next;
      }
   }
	
   cout << " ]";
   return ptr;
}



void main() {
   insertFirst(1,10);
   insertFirst(2,20);
   insertFirst(4,1);
   insertFirst(5,40);
   insertFirst(6,56); 

   cout << "Original List: "; 
   printList();

   while(!isEmpty()) {     
      struct node *temp = deleteFirst();
      cout << "\nDeleted value:"
      cout << "(" << temp->data << "," << temp->data << ")";
      printlist();
   }   
	
   cout << "\nList after deleting all items: ";
   printList();   
}							