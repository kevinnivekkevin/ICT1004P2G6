### To do
![alt text](https://github.com/kevinnivekkevin/ICT1004P2G6/blob/main/githubImages/Capture.PNG?raw=true)

### changelog (28/11)
	-Replaced sha1() password storing with password_hash() for admins and participants (safer since same passwords gen. same the hashes in db)
	-Compiled All_Events (admin
	-Removed My_Events(admin)(alr included in all_events)
	-Compiled Simulation (under "/MDP/Simulation/Simulation.php")
	-Removed calendar (It currently just serves a static image?)
	-Updated all pages to include navbarAdmin & navbarParticipant instead of hardcode
	-Added session checking in adminNavBar to prevent direct access of admin page without authenticating as admin first
	-Added "logged in as: " in admin & participant navbars
