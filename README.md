# Shopping List Application
---
### Overview

As a healthcare company we have a keen eye on healthy eating and it’s been suggested by an employee that we have an easy way to keep track of what we need, 
what needs to be purchased and keep spending within the budget constraints. Below, are a number of stories which will achieve this objective.

---
### Below are the requirement the app is fulfilling

1. View a list of items on a shopping list
- Requirements: Create a shopping list that can contain a list of groceries

2. Add items to the shopping list
- Requirements: Create a way for a user to add an item to the shopping list

3. Remove stuff from the shopping list
- Requirements: Create a way for users to know what they have and haven’t already picked up

4. When I’ve bought something from my list I want to be able to cross it off the list
- Requirements: Persist shopping list state between page visits

5. Persist the data so I can view the list if I move away from the page
- Requirements: Persist shopping list state between page visits

7. Total up the prices
- Requirements: Display the total cost for the whole shop
---
## Install the Application

Create a directory to contain the app:

```bash
mkdir shopping_list
```

Once inside the new directory, clone this repo:

```bash
git clone git@github.com:SniffleSneeze/shopping_list.git .
```

One cloned, you must install the slim components by running:

```bash
composer install
```

To run the application locally:
```bash
composer start
```

---
## Database Information

The Application is using mySQL to ensure that the local app will work you will need to create a table call `list`.

The Database connection is set to:
- ip -> 127.0.0.1
- port -> 3306

See bellow for the script to run:

```sql
CREATE TABLE `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item` text,
  `price` float DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
```
