#1. Balanced Brackets 
 
Write a function that takes a string of brackets as the input, and determines if the order of the brackets is valid. A bracket is considered to be any one of the following characters: (, ), {, }, [, or ]. 
 
We say a sequence of brackets is valid if the following conditions are met: 
 
* It contains no unmatched brackets. 
* The subset of brackets enclosed within the confines of a matched pair of brackets is also a matched pair of brackets. 
 
Examples: 
 
* (){}[] is valid 
* [{()}](){} is valid 
* []{() is not valid 
* [{)] is not valid 
 