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


class Node {
   int data;
   int key;
	
   class Node next;
}

class Code {
	Node head = NULL;
	Node current = NULL;

	static boolean isEmpty() {
		return head == null;
	}


	static int length() {
		int length = 0;

		if(head == null) {
			return 0;
		}

		current = head.next;
			
		return lenght();
	}



	static void insertFirst(int key, int data) {
		Node link = new Node();
		link.key = key^data;
		link.data = data;
			
		if (!isEmpty()) {
			head = link.next;
			head.next = head;
		} else {
			link.next = head;
			head = link;
		}    
	}


	static Node deleteFirst() {
		Node tempLink = head;
			
		if(head.next = head) {  
			head = null;
			return tempLink;
		}     
			
		return head;
	}


	static int printList() {
		Node ptr = head;
		System.out.print("\n[ ");
			
		if(head != NULL) {
			
			while(ptr->next != head) {     
					System.out.print("(" + ptr->data . "," + ptr->key . ")";
					ptr = head.next;
			}
		}
			
		System.out.print(" ]");
		return ptr;
	}

	public static void main(String[] args) {
		insertFirst(1,10);
		insertFirst(2,20);
		insertFirst(4,1);
		insertFirst(5,40);
		insertFirst(6,56); 

		System.out.println("Original List: "); 
		printList();

		while(!isEmpty()) {     
			Node temp = deleteFirst();
			System.out.print("\nDeleted value:")
			System.out.print("(" + temp->data + ", " + temp->data + ")");
			printlist();
		}   
			
		System.out.print("\nList after deleting all items: ");
		printList();   
	}
}							