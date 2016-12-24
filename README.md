# GNI-OATS

GNI oats will allow to set up your own engaging exams that fit any kind of difficulty level. Build and create your exams & tests with great ease and provide your users with appropriate feedback, so they will have a rich learning experience. 

* Using GNI oats will allows you to
  * create the exams, 
  *	upload the questions from any formats like csv,tsv,xml etc
  *	Set time limit
  *	Segregate questions
  *	generate and manage the results

  ----------------------------------------------------------------------------------------------------------------------------------------
The project contains the following files:
  * **Login.php & Register.php** allows user to login and register for the account.
  * **Dashboard.php** is the landing page after the login. It contains the list of test names and the sets containing in it.
  * **createTest.php** allows user to design the test where he need to specify the details like,
    * Test name
    * Time Limit
    * Total Marks
    * Number Of Questions
    * Marks Per Question
    * Question Set
  * **questionset.php** allows user to enter the questions into a set either providing from the given UI or he can upload the files (csv,tsv,xml) which contains the questions and answer to it.
  * **managequestions.php** allows user to modify the questions. User can **edit, deleter or update** the question and answer content from any set for which he is authorized to.
  * **paper.php** is intended for the user who attends the exam. The user needs to select the exam and hit submit to proceed. Upon proceeding, the question will be displayed from the respective set (the set which is used in createTest) with prescribed time limit.
  * **reportcard.php** is also intended for the user who attends the exam. Upon submitting the answers to exam, the score will be displayed and an option is provided to review his answers with correct ones.
  * **results.php** is intended for the user who conducts the exams, he can track the scores of the applicants and the answers provided by them. He can export this data into files (csv,tsv,xml).

  ----------------------------------------------------------------------------------------------------------------------------------------
**Setup** : Setting Up GNI OATS is simple. upload the project folder in server and modify the **config.php** accordingly.
