choice = True
while choice:

    type = input("Type + - * /: ");


    if type == "+":
        first = int(input("first "))
        second = int(input("second "))
        print("The sum : " + str(first + second))

    if type == "-":
        first = int(input("first "))
        second = int(input("second "))
        print("The sum : " + str(first - second))

    if type == "*":
        first = int(input("first "))
        second = int(input("second "))
        print("The sum : " + str(first * second))

    if type == "/":
        first = int(input("first "))
        second = int(input("second "))
        print("The sum : " + str(first / second))

    answer = input("Do you want to try again: yes no: ")
    if answer == "yes":
        choice = True
    if answer == "no":
        choice = False
