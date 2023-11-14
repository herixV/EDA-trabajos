package Pilas;

public class Main {
    public static void main(String[] args) {
        ArrayStack<Integer> pila = new ArrayStack<>();

        pila.push(5);
        pila.push(2);
        pila.push(8);
        pila.push(10);
        pila.push(1);

        System.out.println("**Insertar Elementos**");
        System.out.println(pila);

        System.out.println("**Eliminar ultimo Elemento**");
        System.out.println(pila.pop());

        System.out.println("**Presentar ultimo Elemento**");
        System.out.println(pila.peek());
        System.out.println(pila);

        System.out.println(pila.pop());
        System.out.println(pila);

    }

}
