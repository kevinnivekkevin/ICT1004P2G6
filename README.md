### To do (Important)
![alt text](https://github.com/kevinnivekkevin/ICT1004P2G6/blob/main/githubImages/Capture.PNG?raw=true)

### To do cont. (Front-end)
	All pages to look consistent and aesthetic (hopefully)
	change all 'organiser' to 'admin'?
	
### To do cont. (Backend)
	All php to use db-config (currently some using, some not)
	All query to use prepared statements
	Rename the php files to their proper names (currently some does represent what it does)

### Bugs found/to-be-fixed (pls add if u find more)
	Navbar highlight 'stuck'
	Blank page shown if user tries to reserve pack twice
	Throw error if input field longer than datatype length in db. (need to check length before submit)
	Admin signup resets all fields after submission with error & no JS for validation
	Users can spam register for the same event
	
### Discussion?
	Edit profile cant change password?
	No page to show users the reservations they made?
	Upload pic to db? (not easy)
	

### changelog (28/11)
	-Replaced sha1() password storing with password_hash() for admins and participants (safer since same passwords gen. same the hashes in db)
	-Compiled All_Events (admin
	-Removed My_Events(admin)(alr included in all_events)
	-Compiled Simulation (under "/MDP/Simulation/Simulation.php")
	-Removed calendar (It currently just serves a static image?)
	-Updated all pages to include navbarAdmin & navbarParticipant instead of hardcode
	-Added session checking in adminNavBar to prevent direct access of admin page without authenticating as admin first
	-Added "logged in as: " in admin & participant navbars
	
### changelog (29/11)
	-Replaced mysqlescapestring with htmlspecialchars to prevent XSS & SQL injection. (mysqli_real_escape_string was not working before)		
	Modified:	
	-Org_Acc.php
	-edit_event.php
	-Reg_event.php 		
	-edit.php (updated from yj ver)			
	-process_reg.php
