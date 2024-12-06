import java.util.*;

// class practice {
//     public static List<List<Integer>> threeSum(int[] nums) {
//         List<List<Integer>> outerlist = new ArrayList<List<Integer>>();
//         List<Integer> innerlist = new ArrayList<Integer>();
//         Arrays.sort(nums);
//         for(int i=0;i<nums.length;i++){
//             int nSum=-nums[i];
//             int left=i+1,right=nums.length-1;
//             while(left<right){
//                 System.out.println("h");
//                 int currSum=nums[left]+nums[right];
//                 if(currSum==nSum){
//                     innerlist.add(nums[i]);
//                     innerlist.add(nums[left]);
//                     innerlist.add(nums[right]);
//                     left++;
//                 }else if(currSum<nSum){
//                     left++;
//                 }else{
//                     right--;
//                 }
//                 if(!outerlist.contains(innerlist)){
//                     outerlist.add(new ArrayList<>(innerlist));
//                 }
//                 innerlist.clear();
//             }
//         } 
//         return outerlist;
//     }
//     public static void main(String[] args) {
//         int[] arr={-1,0,1,2,-1,-4};
//         System.out.println(threeSum(arr));
//     }
// }
class practice {
    public static List<List<Integer>> fourSum(int[] nums, int target) {
        List<List<Integer>> outerlist = new ArrayList<List<Integer>>();
        List<Integer> innerlist = new ArrayList<Integer>();
        Arrays.sort(nums);
        for(int i=0;i<nums.length;i++){
            int neededSum=target-nums[i];
            for(int j=i+1;j<nums.length;j++){
                neededSum-=nums[j];
                int left=j+1,right=nums.length-1;
                while(left<right){
                    int currsum=nums[left]+nums[right];
                    if(currsum<neededSum){
                        left++;
                        }else{
                            if(currsum==neededSum){
                            System.out.println(neededSum+" "+currsum);
                            innerlist.add(nums[i]);
                            innerlist.add(nums[j]);
                            innerlist.add(nums[left]);
                            innerlist.add(nums[right]);
                            System.out.println(innerlist);
                        }
                        right--;
                    }
                    if(!innerlist.isEmpty()&&!outerlist.contains(innerlist)){
                        outerlist.add(new ArrayList<>(innerlist));
                    }
                    innerlist.clear();
                }
            }
        }
        return outerlist;
    }
    public static void main(String[] args) {
        int[] arr={1,0,-1,0,-2,2};
        // -2 -1 0 0 1 2
        System.out.println(fourSum(arr,0));
    }
}