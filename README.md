# Login_1DV610
Interface repository for 1DV610 assignment 2 and 4

This is the readme for login assignment by Elias Ekman.

Runable Site [here](https://ee222yi.herokuapp.com/).

***

# Use Cases

[UC1 -UC4](https://github.com/dntoll/1dv610/blob/master/assignments/A2_resources/UseCases.md)

***

## UC5 - Add List Item

### __Precondition__
UC1. User has to be logged in

### __Main Scenario__

1. Starts when a user wants to add a item to the list.
2. User gets a notification of the item being saved.

***

## UC6 - Show List

### __Precondition__
UC1 and UC5 - User is logged in and has items in the list.

## __Main Scenario__
1. A user has added items to the list
2. The list is being showed the list

# Test Cases

[TC1-TC4](https://github.com/dntoll/1dv610/blob/master/assignments/A2_resources/TestCases.md)

## Test Case 5.1: Add item
Make sure item is added to .txt file

### __Input__
* Test case 1.7

### __Output__
* Test case 1.7
* Message field "Saved!" comes up.
* The .txt file has been updated.

***

## Test Case 5.2: Add empty item
Add a empty item

### __Input__
* Test case 1.7

### __Output__
* Message field "Saved!" comes up again.
* The .txt file has been updated.

***

## Test Case 6.2: Show List
Make sure list has items and displays them.

### __Input__
* Test Case 5.1.
* Press the button to show list.

### __Output__
* The fieldset of list comes up.
* The list is not show in the fieldset.

***