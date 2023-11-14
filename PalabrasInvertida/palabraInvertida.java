package Pilas;

import java.util.Scanner;

public class palabraInvertida {
    
public static void main(String[] args) {
    ArrayStack <Character> palabra = new ArrayStack<>();

    Scanner sc = new Scanner(System.in);

    System.out.println("Escribe una palabra para invertir");
    String word= sc.nextLine();


    for( int i=0; i<word.length(); i++){
    palabra.push(word.charAt(i));
    System.out.println(palabra);
    
    }
    
    



}}
