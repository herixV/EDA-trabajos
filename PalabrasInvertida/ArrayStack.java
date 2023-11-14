
package Pilas;

import java.util.EmptyStackException;

public class ArrayStack<T> implements StackADT<T> {

    private T[] stack;
    private int top;
    private final int DEFAULT_CAPACITY = 50;

    public ArrayStack() {
        top = 0;
        stack = (T[]) (new Object[DEFAULT_CAPACITY]);
    }

    public void push(T element) {

        if (size() == stack.length) {

            expandCapacity(); 
        }

        // validar el elemento de la cima
        stack[top] = element;
        top++;
    }

    private void expandCapacity() {
        T[] nuevo = (T[]) (new Object[stack.length * 2]);

        for (int i = 0; i < stack.length; i++) {
            nuevo[i] = stack[i];
        }
        stack = nuevo;
    }

    public T pop() throws EmptyStackException {
        if (isEmpty()) {
            throw new EmptyStackException();
        }

        top--;
        T result = stack[top];
        stack[top] = null;
        return result;
    }

    public T peek() {

        return stack[top - 1];
    }

    public int size() {
        return top;
    }

    public boolean isEmpty() {
        return top == 0;
    }

    public String toString() {

        String pila = "";

        for (int i = top - 1; i >= 0; i--) {
            pila = pila + stack[i] + "-";
        }
        return pila;
    }

}
