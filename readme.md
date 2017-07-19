PHP exercises from book "PHP 7. Praktyczny Kurs" written by Marcin Lis.
http://helion.pl/ksiazki/php7-praktyczny-kurs-marcin-lis,php7pk.htm

I've decided to do these example exercises as form of review of my knowledge about structural php, object oriented php and PDO.

Here is complete list of tasks which i was supposed to do, ordered by chapters and lessons in book:

Chapter 2
    Lesson 4
        1. Write an example code showing how bit operators work.
        2. Write an example code showing how assignment operators work.
        3. Write an example code showing how priority operators work.
    
    Lesson 5
        1. Modify original code to make it use construction if... else if.
        2. Create switch instruction with two cases: where variable $number must be equal to 10 or 20 or different from both, 10 and 20.
        3. Count from 0 to 9 using while loop.
        4. Show "do...while" loop being executed at least once.
        5. Count from 0 to 0 using while loop and with value being changed in condition of if statement.
        6. Modify code to do the same thing as it does but without need of using instruction "continue" in a loop.
        7. Create a for loop showing all numbers from 30 to 0 divisible by 3, ordered in decreasing way.
        8. Create a single for loop using just one variable to output two columns of numbers: one increasing from 1 to 10, other decreasing from 10 to 1.

    Lesson 6
        1. Modify code in a way so there would be no need to use extra variable $result.
        2. Create a multiplication function multiplying two arguments.
        3. Create a power function which will be using power of 3 on argument passed by reference.
        4. Create a function receiving two arguments of int type. Result of function will be power of both arguments. If second argument is not passed then it will be getting by default value of 1.
        5. Create a function comparing two values and outputting one which is lower.

    Lesson 7
        1. Using function date create a script showing: name of day of a week (in polish language), full date (four digit year), time in 12h mode with mark of am/pm, and difference to GMT (UTC) time.
        2. Create a script showing number of days left to end of current year.
        3. Create a script which will tell what day of week is on date of choice.
        4. Create a script showing page rendering time expressed in seconds and microseconds displayed separately.
        5. Create a page which will load different views depending on time of day or night.
    
    Lesson 8
        1. Create a function to switch lower cases to upper cases and upper cases to lower cases at the same time.
        2. Create function to convert polish characters between ISO-8859-2 and Windows-1250 standards.
        3. Create a function for censoring text. It should be passing two arguments: string to censor and array with list of censored expressions. Every censored string should be replaced with: [*****]
        4. Create a function passing as argument a string with www address and it will return said address in form of clickable link.
        5. Create a function which will be counting number of occurrences of a string in a text. Both strings are supposed to be passed by arguments. Do not use substr_count() function.

    Lesson 9
        1. Create a script counting number of odd and even numbers in array of numbers.
        2. Create a function processing an array containing strings to replace polish characters with similar characters of latin alphabet.
        3. Create a code which will separate elements of one array into two arrays: one containing strings only, other with numbers only.
        4. Create a function sorting an array with integers starting with numbers divisible by 3 ordered in decreasing way, next numbers not divisible by 3 ordered in increasing way.
        5. Create a script sorting an array with strings: start with strings with lower case character in beginning in decreasing order, next start with strings with capital character in beginning in decreasing order.

Chapter 3
    Lesson 10
        1. Modify code so call of function readdir() was in loop instead of in condition.
        2. Create a script reading contents of directory by using readdir() function and displaying data in alphabetical order ascending.
        3. Create a script displaying contents of directory first showing names of subdirectories, next names of file. User function scandir().
        4. Create a function passing two arguments which will count space used by directory. First argument is a path to measured directory, second argument is boolean defining if subdirectories should be counted as well or not.
        5. Create a script displaying a date of last modification of said script file.

    Lesson 11
        1. Modify a code so it will number lines of text.
        2. Create a script replacing polish characters with latin ones in a text file.
        3. Create a script reversing order of lines in a text file.

    Lesson 12
        1. Create a script of counter with a file containing number of views and start date.
        2. Modify code to save to file stats.txt just last 10 views.
        3. Create a script which will be displaying other contents of a site to users with IP adresses listed in a text file.

Chapter 4
    Lesson 13
        1. Create a script calculating root of quadratic equasion.
        2. Create a simple calculator operating on two values. To select type of operation use "radio" input type.
        3. Create a script for uploading a file. After transmission display file info: original name, temporary name, file size  and MIME type.
        4. Create a script for uploading the file. After upload script should be showing direct link to uploaded file.
        5. Modify existing code to use fwrite() function instead of file_put_contents().
        6. Modify existing code to make new opinions being saved in beginning of a file.
        7. Limit number of listed elements. To manipulate a number use GET.

    Lesson 14
        1. Create a single file containing php and html code for handling downloads.
        2. Create a script automatically generating a list.
        3. Create a script letting you to download only files of specified file type.
        4. Modify previous exercise to allow more file types.
        5. Create a script allowing to send 0-length files without outputting a warning.

    Lesson 15
        1. Create a script using cookies to store user's number of views and after reaching defined limit displays adequate info.
        2. Create a script saving in cookies user's birth date and outputs proper info on that day.
        3. Do not allow html tags to be input in form.
        4. If value in cookie is not a number display appropriate message.
        5. Create views counter ignoring page refreshes, use cookies.

    Lesson 16
        1. Create a script allowing log on of many users.
        2. Create a script using session to protect a website with a password.
        3. Create a script allowing to live session between subpages of a website.
        4. Create a script allowing a single user during one session to send just up to 3 files.
        5. Create a script with log in system with redirection from logout page to main page.
        6. Create a script allowing in password only alphanumeric characters and not allowed colon, also a user can log in using few passwords

Chapter 5
    Lesson 17
        1. Create a class Point storing info about location of point on a screen. It should have two parameters: x and y and methods setting their values.
        2. Create object oriented list of visits. writeData() method must be passing via arguments data to write.
        3. Crate object oriented visits counter.
        4. Create object oriented script showing list of URLs with their descriptions. List of links and list of descriptions should be in separate classes.
    
    Lesson 18
        1. Create a code of class Point3D which extends class Point. Extending class should have getters and setters for Z parameter.
        2. Create a code with protected variables id and name.
        3. In class Point add static method "newPoint" returning new Point object with parameters (0, 0).
        4. Create a class Person with protected array of first name and last name.
        5. From class Person from previous exercise create a class User which will be extending class Person and setting and getting ID of a user.

    Lesson 19
        1. To class Container add a method "setElement" which will let to add new elements into an array $tab.
        2. Modify code from previous exercise to make method "setElement" just to modify array elements and on attempt to add to array throwing an exception.
        3. Modify code from exercise 19.1 to make method "setElement" just to add new elements to array and on attempt of modification throwing an exception.
        4. Create a class Container which will be passing value of element via exception.

Chapter 6
    Lesson 20
        1. Modify a script to make it behave correctly when: there is no files, saved files have extensions different than: .jpg, .gif, .png, also when subdirectories exist.
        2. Create a script for images gallery to make every image have description taken directly from a text file of name of image file.
        3. Create a script scaling image to custom resolution. Name and target resolution of a file should be passed as argument.
        4. Create a script scaling all images in a folder by predefined percentage.
        5. Create a script converting image files between various formats.

Chapter 7
    Lesson 21
        1. Create a script allowing connections only from IP adresses stored in a text file.
        2. Load list of IPs from text files only when it is required.
        3. Create a script which will be loading different versions of a website accordingly to a webbrowser used by client.
        4. Create a script downloading a file from FTP. Parameters of connection will be provided in terminal on executing script.
        5. Create a script sending email messages to make it send 3 messages during single session.
        6. Create a script sending email message to make it send messages to addresses provided via form.

Chapter 8
    Lesson 24
        1. Create a script showing contents of table person from mysql database and make it sortable by user's choice.
        2. Create a script showing contents of table person from sqlite database and make it sortable by user's choice.
        3. Create a script showing all data from selected table of mysql database which will be automatically adjusting to changes of table's structure.
        4. Create a script showing all data from selected table of sqlite database which will be automatically adjusting to changes of table's structure.
        5. Create a script showing data from table person.
        6. Create a script allowing to add records via web interface to mysql table person.
        7. Create a script allowing to add records via web interface to sqlite table person.
        8. Modify a code of exercises 24.6 and 24.7 to make them generate id automatically if user will not provide it.

    Lesson 26
        1. Create a script with a poll generating selection options based on contents of table colors.
        2. Create a script showing number of currently viewing website users and operating on table stats with sqlite database.
        3. Create a log in script allowing every user to have its own main site.
        4. Create a script which based on data from table stats will list stats of operating systems and webbrowsers.
        5. Create a script for managing (adding, modifying, removing) records in table users.