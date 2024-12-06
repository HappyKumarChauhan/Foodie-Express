
// Definition for singly-linked list.
class ListNode {
    int val;
    ListNode next;
    ListNode() {}
    ListNode(int val) { this.val = val; }
    ListNode(int val, ListNode next) { this.val = val; this.next = next; }
}
 
public class linkedlist {
    
    public static int findLength(ListNode head){
        int length=0;
        ListNode temp=head;
        while(temp!=null){
            temp=temp.next;
            length++;
        }
        return length;
    }
    public static ListNode removeNthFromEnd(ListNode head, int n) {
        int len=findLength(head);
        int i=1;
        ListNode temp=head;

        while(i<len-n){
            temp=temp.next;
            i++;
        }
        temp.next=temp.next.next;
        return head;
    }
    public static void main(String[] args) {
        ListNode head=new ListNode(1);
        head.next=new ListNode(2);
        head.next.next=new ListNode(3);
        head.next.next.next=new ListNode(4);
        head.next.next.next.next=new ListNode(5);
        removeNthFromEnd(head,2);
    }
}