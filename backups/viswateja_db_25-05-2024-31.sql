

CREATE TABLE `actual_fee` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(30) NOT NULL,
  `Class` varchar(30) NOT NULL DEFAULT '0',
  `Route` varchar(50) NOT NULL DEFAULT '0',
  `Fee` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `address_temp` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Id_No` varchar(25) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Sur_Name` varchar(50) NOT NULL,
  `Father_Name` varchar(50) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Class` varchar(30) NOT NULL,
  `Section` varchar(5) DEFAULT NULL,
  `House_No` varchar(15) DEFAULT NULL,
  `Area` varchar(50) DEFAULT NULL,
  `Village` varchar(50) DEFAULT NULL,
  `Mobile` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `admin` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_Id_No` varchar(50) NOT NULL,
  `Admin_Name` varchar(50) NOT NULL,
  `Mobile` varchar(10) DEFAULT NULL,
  `Admin_Password` varchar(20) NOT NULL,
  `Admin_Hash` varchar(256) NOT NULL,
  `Role` varchar(25) NOT NULL,
  PRIMARY KEY (`S_No`),
  UNIQUE KEY `Admin_Id_No` (`Admin_Id_No`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO admin VALUES
("1","VHST02674","Sarathchandra Reddy","9515744884","Kscr","$2y$10$RT/TVi4ab2Gu4q5kvrhfhe2vxLP7oOw5FA4yK2y7Z.tGQ1ck.mDGm","Super_Admin"),
("2","HIMABINDU","HIMABINDU","7675072115","HIMABINDU","$2y$10$Vr/p8DVvbVmlSZimWfgI0eoLDk14i0x.VscTAr604cp0oq0/Z1fgq","Super_Admin"),
("3","VASUDEVAREDDY","VASUDEVAREDDY","7816081245","VASUDEVAREDDY","$2y$10$3IMQCjURG5bz1fPZLGW/n.Qv6p3BRv7.2hkrMX89lUPBfALjvVsfe","Super_Admin"),
("4","KIRAN","KIRAN","6301264406","KIRAN","$2y$10$hXPVhn/V9MKM5pA29PDcsuC0o86dVhmV2Eqa90.warhwHTJB/LvI2","Super_Admin");




CREATE TABLE `admissiona` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Adm_No` varchar(30) NOT NULL,
  `First_Name` varchar(60) NOT NULL,
  `Sur_Name` varchar(40) NOT NULL DEFAULT '0',
  `Parent_Name` varchar(70) NOT NULL DEFAULT '0',
  `DOB` varchar(15) NOT NULL DEFAULT '0',
  `Residence` varchar(50) NOT NULL DEFAULT '0',
  `Occupation` varchar(50) NOT NULL DEFAULT '0',
  `Previous_School` varchar(50) NOT NULL DEFAULT '0',
  `Class_Come` varchar(15) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `TC_No` varchar(30) NOT NULL DEFAULT '0',
  `TC_Pro` varchar(30) NOT NULL DEFAULT '0',
  `DOA` varchar(20) NOT NULL,
  `Mother_Tongue` varchar(15) NOT NULL DEFAULT '0',
  `Nationality` varchar(30) NOT NULL DEFAULT '0',
  `Religion` varchar(20) NOT NULL,
  `Caste` varchar(15) NOT NULL DEFAULT '0',
  `Medium` varchar(15) NOT NULL DEFAULT '0',
  `Class_Admission` varchar(15) NOT NULL,
  `Class_Leave` varchar(15) NOT NULL,
  `DOL` varchar(15) NOT NULL,
  `DOT` varchar(15) NOT NULL,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `admissionb` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Adm_No` varchar(30) NOT NULL,
  `First_Name` varchar(60) NOT NULL,
  `Sur_Name` varchar(40) NOT NULL DEFAULT '0',
  `Parent_Name` varchar(70) NOT NULL DEFAULT '0',
  `DOB` varchar(15) NOT NULL DEFAULT '0',
  `Residence` varchar(50) NOT NULL DEFAULT '0',
  `Occupation` varchar(50) NOT NULL DEFAULT '0',
  `Previous_School` varchar(50) NOT NULL DEFAULT '0',
  `Class_Come` varchar(15) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `TC_No` varchar(30) NOT NULL DEFAULT '0',
  `TC_Pro` varchar(30) NOT NULL DEFAULT '0',
  `DOA` varchar(20) NOT NULL,
  `Mother_Tongue` varchar(15) NOT NULL DEFAULT '0',
  `Nationality` varchar(30) NOT NULL DEFAULT '0',
  `Religion` varchar(20) NOT NULL,
  `Caste` varchar(15) NOT NULL DEFAULT '0',
  `Medium` varchar(15) NOT NULL DEFAULT '0',
  `Class_Admission` varchar(15) NOT NULL,
  `Class_Leave` varchar(15) NOT NULL,
  `DOL` varchar(15) NOT NULL,
  `DOT` varchar(15) NOT NULL,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `attendance_daily` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Id_No` varchar(30) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `AM` varchar(1) DEFAULT NULL,
  `PM` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `class_wise_examination` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Class` varchar(15) NOT NULL,
  `Exam` varchar(50) NOT NULL,
  `Max_Marks` int(11) NOT NULL,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `class_wise_subjects` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Class` varchar(15) NOT NULL,
  `Exam` varchar(50) NOT NULL,
  `Subjects` varchar(20) NOT NULL,
  `Max_Marks` int(11) NOT NULL,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `commit_date` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Id_No` varchar(15) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `DOC` varchar(10) NOT NULL,
  `Status` varchar(20) NOT NULL,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `debiter_master_data` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `AC_No` varchar(15) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL DEFAULT '0',
  `Mobile` varchar(30) NOT NULL DEFAULT '0',
  `Amount` varchar(15) NOT NULL DEFAULT '0',
  `DOC` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`S_No`),
  UNIQUE KEY `Account No` (`AC_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `employee_master_data` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Id` varchar(10) NOT NULL,
  `Emp_First_Name` varchar(50) DEFAULT NULL,
  `Emp_Sur_Name` varchar(30) DEFAULT NULL,
  `Father_Name` varchar(50) DEFAULT '0',
  `Qualification` varchar(30) DEFAULT '0',
  `DOB` varchar(15) DEFAULT NULL,
  `Relation` varchar(20) DEFAULT NULL,
  `Mobile` varchar(10) DEFAULT '0',
  `Aadhar` varchar(12) DEFAULT '0',
  `House_No` varchar(10) DEFAULT '0',
  `Area` varchar(25) DEFAULT '0',
  `Village` varchar(25) DEFAULT '0',
  `DOJ` varchar(15) DEFAULT NULL,
  `Designation` varchar(25) DEFAULT '0',
  `Salary` varchar(11) DEFAULT '0',
  `PF` varchar(11) DEFAULT '0',
  `DOPF` varchar(15) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `AC_No` varchar(20) DEFAULT '0',
  `Bank_Name` varchar(30) DEFAULT '0',
  PRIMARY KEY (`S_No`),
  UNIQUE KEY `Emp_Id` (`Emp_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `faculty` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Id_No` varchar(10) NOT NULL,
  `Faculty_Name` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Fac_Hash` varchar(256) NOT NULL,
  PRIMARY KEY (`S_No`),
  UNIQUE KEY `Admin_Id_No` (`Id_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `holidays` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(30) NOT NULL,
  `Reason` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `stu_att_master` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Id_No` varchar(30) NOT NULL,
  `June` varchar(11) DEFAULT '0',
  `July` varchar(11) DEFAULT '0',
  `August` varchar(11) DEFAULT '0',
  `September` varchar(11) DEFAULT '0',
  `October` varchar(11) DEFAULT '0',
  `November` varchar(11) DEFAULT '0',
  `December` varchar(11) DEFAULT '0',
  `January` varchar(11) DEFAULT '0',
  `February` varchar(11) DEFAULT '0',
  `March` varchar(11) DEFAULT '0',
  `April` varchar(11) DEFAULT '0',
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `stu_fee_master_data` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Id_No` varchar(25) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Class` varchar(25) NOT NULL,
  `Section` varchar(10) DEFAULT NULL,
  `Street` varchar(50) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Actual` varchar(10) NOT NULL,
  `Last_Balance` varchar(10) DEFAULT '0',
  `Current_Balance` varchar(10) NOT NULL,
  `Total` varchar(10) NOT NULL DEFAULT '0',
  `Route` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `stu_marks` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Class` varchar(10) NOT NULL,
  `Section` varchar(5) NOT NULL,
  `Id_No` varchar(10) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Exam` varchar(50) NOT NULL,
  `sub1` varchar(15) DEFAULT NULL,
  `sub2` varchar(15) DEFAULT NULL,
  `sub3` varchar(15) DEFAULT NULL,
  `sub4` varchar(15) DEFAULT NULL,
  `sub5` varchar(15) DEFAULT NULL,
  `sub6` varchar(15) DEFAULT NULL,
  `sub7` varchar(15) DEFAULT NULL,
  `sub8` varchar(15) DEFAULT NULL,
  `sub9` varchar(15) DEFAULT NULL,
  `sub10` varchar(15) DEFAULT NULL,
  `sub11` varchar(15) DEFAULT NULL,
  `Total` varchar(11) DEFAULT '0',
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `stu_paid_fee` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Id_No` varchar(15) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `Class` varchar(10) NOT NULL,
  `Section` varchar(10) NOT NULL,
  `Fee` varchar(10) NOT NULL,
  `DOP` varchar(15) NOT NULL,
  `Bill_No` varchar(10) NOT NULL,
  `Route` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `student` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Id_No` varchar(10) NOT NULL,
  `Stu_Name` varchar(50) NOT NULL DEFAULT '0',
  `Stu_Password` varchar(20) NOT NULL,
  `Stu_Hash` varchar(256) NOT NULL,
  PRIMARY KEY (`S_No`),
  UNIQUE KEY `Id_No` (`Id_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `student_master_data` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Id_No` varchar(20) NOT NULL,
  `Adm_No` varchar(25) DEFAULT '0',
  `First_Name` varchar(50) NOT NULL,
  `Sur_Name` varchar(50) DEFAULT '0',
  `Father_Name` varchar(70) DEFAULT '0',
  `Mother_Name` varchar(50) DEFAULT '0',
  `DOB` varchar(15) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Mobile` varchar(40) DEFAULT '0',
  `Aadhar` varchar(25) DEFAULT '0',
  `Stu_Class` varchar(25) NOT NULL,
  `Stu_Section` varchar(5) DEFAULT NULL,
  `Religion` varchar(20) DEFAULT NULL,
  `Caste` varchar(25) DEFAULT '0',
  `Category` varchar(10) DEFAULT NULL,
  `House_No` varchar(35) DEFAULT '0',
  `Area` varchar(50) DEFAULT '0',
  `Village` varchar(50) DEFAULT '0',
  `DOJ` varchar(15) DEFAULT NULL,
  `Previous_School` varchar(60) DEFAULT '0',
  `Van_Route` varchar(25) DEFAULT NULL,
  `Referred_By` varchar(20) DEFAULT '0',
  `Siblings` text DEFAULT NULL,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB AUTO_INCREMENT=553 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


INSERT INTO student_master_data VALUES
("1","VTST0001","","P.THRISHA","","KONDA REDDY","","","","9908600452","","OthersPassedout-24","","","","","","","BUDAWADA","","","","",""),
("2","VTST0002","","M.NIHARIKA","","NARASINHA RAO","","","","9441698934","","OthersPassedout-24","","","","","","","KANCHERUVU","","","","",""),
("3","VTST0003","","A.YASHWITHA","","SRINIVASULU REDDY","","","","9493025862","","OthersPassedout-24","","","","","","","KRISHANA PURAM","","","","",""),
("4","VTST0004","","SK.SAMEERA","","NAYABRASOOL","","","","7674072196","","OthersPassedout-24","","","","","","","KRISHNAPURAM","","","","",""),
("5","VTST0005","","K.SWATHI","","SASI KUMAR","","","","7702015402","","OthersPassedout-24","","","","","","","DUTTALUR","","","","",""),
("6","VTST0006","","K.SAMMOHANA","","CHINNA SUBBAIAH","","","","9182596236","","OthersPassedout-24","","","","","","","PEGALLAPADU","","","","",""),
("7","VTST0007","","B.CHARITHA","","SUBBAREDDY","","","","9603021466","","OthersPassedout-24","","","","","","","BUDAWADA","","","","",""),
("8","VTST0008","","B.VINEELA","","BRAMHA REDDY","","","","6305966534","","OthersPassedout-24","","","","","","","BUDAWADA","","","","",""),
("9","VTST0009","","P. ANVITHA","","SURENDRA REDDY","","","","9440951878","","OthersPassedout-24","","","","","","","KAPASAMUDRAM","","","","",""),
("10","VTST0010","","CH.BRAMHANI","","BRAMHA REDDY","","","","9492935322","","OthersPassedout-24","","","","","","","YERUKOLLU","","","","",""),
("11","VTST0011","","P.SPANDANA","","RAMAIAH","","","","6302529267","","OthersPassedout-24","","","","","","","KAMPASAMUDRAM","","","","",""),
("12","VTST0012","","B.RISHIKA","","RAMANA REDDY","","","","8106565576","","OthersPassedout-24","","","","","","","KAMPASAMUDRAM","","","","",""),
("13","VTST0013","","D. ANISHA","","OBUL REDDY","","","","9491170267","","OthersPassedout-24","","","","","","","DUTTALUR","","","","",""),
("14","VTST0014","","SK.HAFSANA","","KADHAR BASHA","","","","9949760471","","OthersPassedout-24","","","","","","","NANDIPADU","","","","",""),
("15","VTST0015","","B. NIHARIKA","","NAGESWAR RAO","","","","6309638079","","OthersPassedout-24","","","","","","","NANDIPADU","","","","",""),
("16","VTST0016","","B.VINIL KUMAR REDDY","","BRAMHA REDDY","","","","6304575813","","OthersPassedout-24","","","","","","","BUDAWADA","","","","",""),
("17","VTST0017","","S.MOHITH REDDY","","POORANA REDDY","","","","6304433284","","OthersPassedout-24","","","","","","","BRAMESHWARAM","","","","",""),
("18","VTST0018","","E.PRAVEEN","","VENKATASUBBAIAH","","","","6303394637","","OthersPassedout-24","","","","","","","SINGANA PALLI","","","","",""),
("19","VTST0019","","CH.LOHITH","","PENCHALAIAH","","","","8790587623","","OthersPassedout-24","","","","","","","BRAMANAPALLI","","","","",""),
("20","VTST0020","","B. ASHOK","","VIJAY","","","","9440083867","","OthersPassedout-24","","","","","","","CHANAMPALLI","","","","",""),
("21","VTST0021","","K.ABHISHEK","","LAKSHMI NARAYANA","","","","9441717457","","OthersPassedout-24","","","","","","","NARAWADA","","","","",""),
("22","VTST0022","","N.JESWANTH","","NAGAIAH","","","","9550365709","","OthersPassedout-24","","","","","","","GONUVARI PALLI","","","","",""),
("23","VTST0023","","SK.KHAJA SHAREEF","","KHAJA RASOOL","","","","8008384678","","OthersPassedout-24","","","","","","","LAKSHMIPURAM","","","","",""),
("24","VTST0024","","M.MURALI","","KONDAYA","","","","9346152281","","OthersPassedout-24","","","","","","","RACHUVARI PALLI","","","","",""),
("25","VTST0025","","N.KESAVALU","","N.BALAKRISHNA","","","","7993365129","","OthersPassedout-24","","","","","","","NARRAWADA","","","","",""),
("26","VTST0026","","K.VARSHITH","","VENKATESHWARLU","","","","7569448108","","OthersPassedout-24","","","","","","","KAMPASAMUDRAM","","","","",""),
("27","VTST0027","","K.MAHESH REDDY","","POLI REDDY","","","","9949418667","","OthersPassedout-24","","","","","","","BRAMHANA PALLI","","","","",""),
("28","VTST0028","","M.PRANADEEP","","GOPAL KRISHNA","","","","9491077133","","OthersPassedout-24","","","","","","","YEPILIGUNTA","","","","",""),
("29","VTST0029","","K.SIVA SHANKAR","","SAMBAIAH","","","","7995810180","","OthersPassedout-24","","","","","","","DUTTALUR","","","","",""),
("30","VTST0030","","K.BHANU PRAKESH","","SIDDAIAH","","","","8897479559","","OthersPassedout-24","","","","","","","NARAWADA","","","","",""),
("31","VTST0031","","J.BALA NARAYANA","","ADI NARAYANA","","","","9676210490","","OthersPassedout-24","","","","","","","GUVVADI","","","","",""),
("32","VTST0032","","T.RAJA","","VENKATARATNAM","","","","9492575036","","OthersPassedout-24","","","","","","","GUVVADI","","","","",""),
("33","VTST0033","","D.VINAYKUMAR REDDY","","VENKATASUBBA REDDY","","","","9492680667","","OthersPassedout-24","","","","","","","NANDIPADU","","","","",""),
("34","VTST0034","","K. MADHU BABU","","VENKATESHWARLU","","","","6301334952","","OthersPassedout-24","","","","","","","BRAHMANAPALLI","","","","",""),
("35","VTST0035","","K.NAVEEN","","NARARAJU","","","","8919647632","","OthersPassedout-24","","","","","","","KOTHAPETA","","","","",""),
("36","VTST0036","","G.VENKATA SUNIL","","VENKATA SUBBAIAH","","","","8919082811","","OthersPassedout-24","","","","","","","KAMPASAMUDRAM","","","","",""),
("37","VTST0037","","N.YASWANTH REDDY","","SRINIVASULU REDDY","","","","6305752782","","OthersPassedout-24","","","","","","","KAMPASAMUDRAM","","","","",""),
("38","VTST0038","","L.SUDHARSHAN REDDY","","VENKATA SUBBAREDDY","","","","9182234532","","OthersPassedout-24","","","","","","","KAMPASAMUDRAM","","","","",""),
("39","VTST0039","","CH.PRAVEEN KUMAR REDDY","","NARASA REDDY","","","","9989198302","","OthersPassedout-24","","","","","","","BRAMESHWARAM","","","","",""),
("40","VTST0040","","K.VENGALRAO","","VENGAYAIAH","","","","9542011821","","OthersPassedout-24","","","","","","","CHINAMACHUNUR","","","","",""),
("41","VTST0041","","M.PRAVEEN KUMAR REDDY","","RAMANA REDDY","","","","9390802581","","OthersPassedout-24","","","","","","","KRISHNAPURAM","","","","",""),
("42","VTST0042","","V.HARSHITH REDDY","","ANJI REDDY","","","","9392993353","","OthersPassedout-24","","","","","","","DUTTALUR","","","","",""),
("43","VTST0043","","K.MAHESH    ","","RAMAKRISHNA","","","","8179128950","","OthersPassedout-24","","","","","","","DUTTALUR","","","","",""),
("44","VTST0044","","V.CHAITHANYA","","KRISHNA REDDY","","","","9392044402","","OthersPassedout-24","","","","","","","KRISHNA PURAM","","","","",""),
("45","VTST0045","","G.VISHNU VARDHAN REDDY","","VENKATESHWARLU","","","","9392524913","","OthersPassedout-24","","","","","","","KAMPASAMUDRAM","","","","",""),
("46","VTST0046","","SK.KHAJA VALI","","KARIMULLA","","","","9951478259","","OthersPassedout-24","","","","","","","NARAWADA","","","","",""),
("47","VTST0047","","E.BHARATH","","SURESH","","","","7842246152","","OthersPassedout-24","","","","","","","NARAWADA","","","","",""),
("48","VTST0048","","K.KEERTHANA","","SUBBSREDDY","","","","7672060746","","OthersPassedout-24","","","","","","","DUTTALUR","","","","",""),
("49","VTST0049","","N.HEMA CHARAN","","CHENNARAYUDU","","","","7995982566","","OthersPassedout-24","","","","","","","KAMPASAMUDRAM","","","","",""),
("50","VTST0050","","B.MAHESHWAR REDDY","","KONDA REDDY","","","","8008796344","","OthersPassedout-24","","","","","","","RACHAVARIPALLI","","","","",""),
("51","VTST0051","","N.BABU","","SIMAN","","","","6303824778","","OthersPassedout-24","","","","","","","KAMPASAMUDRAM","","","","",""),
("52","VTST0052","","B. THANUJA","","JANARDHAN  ","","","","7287909771","","10 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("53","VTST0053","","B. BHAVYA","","JANARDHAN","","","","7287909771","","10 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("54","VTST0054","","J. SANJANA","","RAVI","","","","9949262843","","10 CLASS","A","","","","","","KOTHAPETA","","","","",""),
("55","VTST0055","","T. VENKATA RAMANAMMA","","RAMANAIAH","","","","9494830954","","10 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("56","VTST0056","","N. VARSHA","","ADAIAH","","","","8688973035","","10 CLASS","A","","","","","","NARAWADA","","","","",""),
("57","VTST0057","","D. AMRUTHA","","RADHA KRISHNA","","","","7732026500","","10 CLASS","A","","","","","","NARAWADA","","","","",""),
("58","VTST0058","","K. RANI TEJASWINI","","THIRIPALU","","","","6304677625","","10 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("59","VTST0059","","SD. SUMAYA","","JEELANI","","","","9441037357","","10 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("60","VTST0060","","M. KOUSHITHA","","KONDA REDDY","","","","9493513225","","10 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("61","VTST0061","","B. LAKSHMI JAYANTHI","","LAKSHMI NARASAIAH","","","","9963248285","","10 CLASS","A","","","","","","UMMAIPALLI","","","","",""),
("62","VTST0062","","P. SANHITHA","","KONDA REDDY","","","","6382054540","","10 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("63","VTST0063","","S. V. BHAVYA SRI","","VENKATESWARA REDDY","","","","6281394112","","10 CLASS","A","","","","","","DUTTALURU","","","","",""),
("64","VTST0064","","S. RAMA CHARITHA","","RAMCHANDRA","","","","7671854534","","10 CLASS","A","","","","","","DUTTALUR","","","","",""),
("65","VTST0065","","M. DEVAYANI","","NARAYANA","","","","9986752779","","10 CLASS","A","","","","","","DUTTALUR","","","","",""),
("66","VTST0066","","G. VYSHNAVI","","VENKATESWARLU","","","","9392524913","","10 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("67","VTST0067","","M. KRISHNA KUMARI","","BHASKAR REDDY","","","","8919781188","","10 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("68","VTST0068","","G. SUNIL","","RAMANAIAH","","","","9490248643","","10 CLASS","A","","","","","","P.R.DODLA","","","","",""),
("69","VTST0069","","CH.JASWANTH","","RAGHU RAMULU","","","","9014424778","","10 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("70","VTST0070","","K. HARSHA","","KRISHNA  ","","","","9441960175","","10 CLASS","A","","","","","","VENKATAM PETA","","","","",""),
("71","VTST0071","","N. BALA VENKATESH","","VENKATAIAH","","","","7569968022","","10 CLASS","A","","","","","","VENGAMMA","","","","",""),
("72","VTST0072","","D. V. CHRAN","","RAMESH","","","","9014794095","","10 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("73","VTST0073","","S. SRUJAN KUMAR","","SUBBARAYUDU","","","","8639756618","","10 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("74","VTST0074","","N. TEJA","","THIMMAYA","","","","9390318286","","10 CLASS","A","","","","","","CHABOLE","","","","",""),
("75","VTST0075","","SD. SADIK","","KHAJA MAHABOOB","","","","7330981527","","10 CLASS","A","","","","","","LAKSHMI PURAM","","","","",""),
("76","VTST0076","","D. NAGENDRA","","VENKATESWARLU","","","","9398477124","","10 CLASS","A","","","","","","UMMAIPALLI","","","","",""),
("77","VTST0077","","R. OBUL REDDY","","OBUL REDDY","","","","7207026096","","10 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("78","VTST0078","","G. ASWITH","","SREENIVASULU","","","","9676059045","","10 CLASS","A","","","","","","A.C.COLONY","","","","",""),
("79","VTST0079","","A. BALAJI","","SUBBAIAH","","","","9177243841","","10 CLASS","A","","","","","","CHERUVUPALLI","","","","",""),
("80","VTST0080","","P. HARSHA VARDHAN","","RAMAIAH","","","","6302529267","","10 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("81","VTST0081","","N. GOWTHAM REDDY","","VENKATA KRISHNA REDDY","","","","9000668068","","10 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("82","VTST0082","","P. MANI KUMAR","","PULLAIAH","","","","6300017094","","10 CLASS","A","","","","","","CHERUVUPALLI","","","","",""),
("83","VTST0083","","K. SREMANTH","","SUDHAKAR","","","","9390304595","","10 CLASS","A","","","","","","KOTHAPETA","","","","",""),
("84","VTST0084","","P. SURESH REDDY","","KONDA REDDY","","","","9908600452","","10 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("85","VTST0085","","CH.SIVASOWRYA","","MALLIKARJUNA","","","","7032007263","","10 CLASS","A","","","","","","NANDIPADU","","","","",""),
("86","VTST0086","","P.HEMA CHARITH","","VENKATESWARLU","","","","9490099503","","10 CLASS","A","","","","","","NANDIPADU","","","","",""),
("87","VTST0087","","P. RAMCHRAN TEJA","","VENKATESWARLU","","","","7671026482","","10 CLASS","A","","","","","","UMMAYAPALI","","","","",""),
("88","VTST0088","","P. GURU CHARAN","","GURAVAYYA","","","","7901499168","","10 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("89","VTST0089","","B. VIKRAM","","ESWARREDDY","","","","9492408665","","10 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("90","VTST0090","","S. V. KOUSHIK","","VENKATA RAMANAIAH","","","","8978146928","","10 CLASS","A","","","","","","BOYAMADUGU","","","","",""),
("91","VTST0091","","SK. MUZASSAM","","JAFARALI","","","","6281777400","","10 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("92","VTST0092","","D. OMKAR REDDY","","CHENNA REDDY","","","","6304176244","","10 CLASS","A","","","","","","BUDAWADA","","","","",""),
("93","VTST0093","","G.ABDUL REHAMAN","","MEERAVALI","","","","6304906584","","10 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("94","VTST0094","","N. TIRUMALASH","","VENKATARATHNAM","","","","7569815401","","10 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("95","VTST0095","","M. DINESH KUMAR","","SURESH","","","","9493351612","","10 CLASS","A","","","","","","UDYAGIRI","","","","",""),
("96","VTST0096","","CH. KARTHIK","","SRINIVASULU","","","","7330954202","","10 CLASS","A","","","","","","PEGALAPADU","","","","",""),
("97","VTST0097","","SK.MEHARAJ","","MASTHAN","","","","9676424620","","10 CLASS","A","","","","","","KRISHNAPURAM","","","","",""),
("98","VTST0098","","SD. ALIYA","","KHAJA MOHIDDIN","","","","7036377271","","10 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("99","VTST0099","","SD.NASIHA","","MYNUDDIN","","","","7730955740","","10 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("100","VTST0100","","G.LOKESH","","VENKATESWARLU","","","","6300162993","","10 CLASS","A","","","","","","KAMPASAMUDRAM","","","","","");
INSERT INTO student_master_data VALUES
("101","VTST0101","","G.DINESH SAI","","NARASIMHA RAO","","","","8897339750","","10 CLASS","A","","","","","","KRISHNAPURAM","","","","",""),
("102","VTST0102","","R.PARVEEN SINGH","","CHANDAN SINGH","","","","9440801553","","10 CLASS","A","","","","","","DUTTALUR","","","","",""),
("103","VTST0103","","K.V.RAMANA","","MASTHAN","","","","6281313897","","10 CLASS","A","","","","","","KOTHAPETA","","","","",""),
("104","VTST0104","","A. AFRITHA","","SREENIVASULU","","","","9493205862","","9 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("105","VTST0105","","B. RUPA","","MADHU","","","","9505032822","","9 CLASS","A","","","","","","NARRAWADA","","","","",""),
("106","VTST0106","","D. V. L. PRANATHI","","VENKATESWARLU","","","","6304772131","","9 CLASS","A","","","","","","KAMPASMUDRAM","","","","",""),
("107","VTST0107","","D. AMULYA","","RADHA KRISHNA","","","","7732026500","","9 CLASS","A","","","","","","NARAWADA","","","","",""),
("108","VTST0108","","G. SUJITHA","","VENKATA SUBBAREDDY","","","","8500424685","","9 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("109","VTST0109","","G. AMEESHA","","MEERAVALI","","","","6304906584","","9 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("110","VTST0110","","G.PERSESUS RANI","","CHINANARAYANA","","","","9493914761","","9 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("111","VTST0111","","K. SANJANA","","SIDHAIAH","","","","8897479559","","9 CLASS","A","","","","","","NARRAWADA","","","","",""),
("112","VTST0112","","K. HEMA LATHA","","MALLI KARJUNA","","","","8106398285","","9 CLASS","A","","","","","","NARRAWADA","","","","",""),
("113","VTST0113","","K. SREE VIDYA","","SUDHAKAR","","","","9390304595","","9 CLASS","A","","","","","","KOTHAPETA","","","","",""),
("114","VTST0114","","K. NIHITHA SRI","","VENKATESWARLU","","","","7569448108","","9 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("115","VTST0115","","K. SREEJA","","LAKSHMI NARYANA","","","","9441717457","","9 CLASS","A","","","","","","NARAWADA","","","","",""),
("116","VTST0116","","M. HARI KEERTHANA","","HAZARATH","","","","9494847453","","9 CLASS","A","","","","","","DUTTALUR","","","","",""),
("117","VTST0117","","N. SNEHITHA","","SREENIVASULU","","","","9398466401","","9 CLASS","A","","","","","","YAPILIGUNTA","","","","",""),
("118","VTST0118","","P. MOKSHITHA","","GURAVA REDDY","","","","8978333371","","9 CLASS","A","","","","","","BUDAWADA","","","","",""),
("119","VTST0119","","S. DHARANI","","SUBBA REDDY","","","","7680925702","","9 CLASS","A","","","","","","KRISHANAPURAM","","","","",""),
("120","VTST0120","","SK. NASHRA","","KHAJA NAWAZ","","","","6303523306","","9 CLASS","A","","","","","","DASARA PALLI","","","","",""),
("121","VTST0121","","V. HASMITHA","","ANJIREDDY","","","","9392993353","","9 CLASS","A","","","","","","DUTTALUR","","","","",""),
("122","VTST0122","","D. GURAVAIAH","","GURAVAIAH","","","","9490466611","","9 CLASS","A","","","","","","DUTTALUR","","","","",""),
("123","VTST0123","","A. VISHNU VARDHAN","","SREENIVASULU","","","","9100404955","","9 CLASS","A","","","","","","BUDAWADA","","","","",""),
("124","VTST0124","","B. ABHISHEK","","VIJAY","","","","9440083867","","9 CLASS","A","","","","","","CHENNAMPALLI","","","","",""),
("125","VTST0125","","B. MANOJ","","NAGA MALLESH","","","","9100374784","","9 CLASS","A","","","","","","UMMAIPALLI","","","","",""),
("126","VTST0126","","D. RAHUL","","SREENU","","","","9441960168","","9 CLASS","A","","","","","","DUTTALUR","","","","",""),
("127","VTST0127","","D. MONOVIKAS","","MALYADRI","","","","7995158294","","9 CLASS","A","","","","","","BRAMESHWARAM","","","","",""),
("128","VTST0128","","P.V.REVANTH","","RAMESH","","","","7993196978","","9 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("129","VTST0129","","G. SREENU","","THIRUPATHAIAH","","","","8985414217","","9 CLASS","A","","","","","","ROMPIDODLA","","","","",""),
("130","VTST0130","","G. KIRAN","","THIRUPATHAIAH","","","","7601079158","","9 CLASS","A","","","","","","ROMPIDODLA","","","","",""),
("131","VTST0131","","G. PRANEETH","","SANKARAIAH","","","","8341238509","","9 CLASS","A","","","","","","YETTIPALEM","","","","",""),
("132","VTST0132","","J. P. GANESH","","PENCHALANARASIMHALU","","","","7386525127","","9 CLASS","A","","","","","","CHERUVUPALLI","","","","",""),
("133","VTST0133","","K. SANTHOSH","","RAMANA RAJU","","","","9492332511","","9 CLASS","A","","","","","","CHERUVUPALLI","","","","",""),
("134","VTST0134","","K. SUDHAR SHAN","","NARAYANA","","","","9542251981","","9 CLASS","A","","","","","","DUTTALUR","","","","",""),
("135","VTST0135","","K.NISHITH","","VENKATAREDDY","","","","9014677649","","9 CLASS","A","","","","","","DUTTALUR","","","","",""),
("136","VTST0136","","M. V. SUMANTH","","VENKATESWARLU","","","","7981637906","","9 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("137","VTST0137","","M. PRASAD","","RAMARAJU","","","","9440808955","","9 CLASS","A","","","","","","CHERUVUPALLI","","","","",""),
("138","VTST0138","","M. HEMANTH","","RAMESH","","","","6303149244","","9 CLASS","A","","","","","","GUVVADI","","","","",""),
("139","VTST0139","","M. MOHAN KRISHNA","","GOPAL","","","","9491077133","","9 CLASS","A","","","","","","YEPILIGUNTA","","","","",""),
("140","VTST0140","","P. V. HEMANTH","","CHINNAIAH","","","","9441986099","","9 CLASS","A","","","","","","UMMAIPALLI","","","","",""),
("141","VTST0141","","P. V. KARTHIK","","HAZARATH","","","","9177469451","","9 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("142","VTST0142","","P. NANI VARDHAN","","CHINA NARAYANA ","","","","9398229877","","9 CLASS","A","","","","","","YERIKOLLU","","","","",""),
("143","VTST0143","","R.MOKSHGNA","","VENKATESWARLU","","","","810676154","","9 CLASS","A","","","","","","NANDIPADU","","","","",""),
("144","VTST0144","","SK. NIHAL","","KADHAR BASHA","","","","9949760471","","9 CLASS","A","","","","","","NANDIPADU","","","","",""),
("145","VTST0145","","SK.KHAJA MUJAHID","","NAYAB RASOOL","","","","9346852644","","9 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("146","VTST0146","","SK.WASEEM","","KADHAR MASTHAN","","","","80008573947","","9 CLASS","A","","","","","","LAKSHMI PURAM","","","","",""),
("147","VTST0147","","S. VAMSI","","THIRUPATHAIAH","","","","6304118406","","9 CLASS","A","","","","","","VENGANAPALEM","","","","",""),
("148","VTST0148","","V. V. RITHEESH","","VENKATESWARLU","","","","7981178840","","9 CLASS","A","","","","","","DUTTALUR","","","","",""),
("149","VTST0149","","Y. MANOHAR","","MALYADRI","","","","9182041208","","9 CLASS","A","","","","","","VENGANNAPALEM","","","","",""),
("150","VTST0150","","A.HASEENA","","HAJARATH","","","","6302321700","","9 CLASS","A","","","","","","THAMIDIPADU","","","","",""),
("151","VTST0151","","N.MANJUSHA","","SRINIVASULU","","","","6305752782","","9 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("152","VTST0152","","CH. VENKATA HARSHITHA","","MARUTHI","","","","9553185400","","8 CLASS","A","","","","","","DUTTALUR","","","","",""),
("153","VTST0153","","CH. JYOSHNA SRI","","RAMESH","","","","8008633140","","8 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("154","VTST0154","","N. PRANA DEEKSHITHA","","RAMI REDDY","","","","9014442109","","8 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("155","VTST0155","","G. PRANAVI","","SURENDRA","","","","8688781254","","8 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("156","VTST0156","","B. KALPANA","","VENKATESWARLU","","","","9492334661","","8 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("157","VTST0157","","CH. NAGA DEEKSHITHA","","THIRUPATHI","","","","6302528148","","8 CLASS","A","","","","","","CHABOLU","","","","",""),
("158","VTST0158","","V. GEETHIKA","","PRABHAKAR","","","","9490465496","","8 CLASS","A","","","","","","KAMAVARI PALEM","","","","",""),
("159","VTST0159","","P. SIGHNITHA","","RAJASEKHAR","","","","9989196360","","8 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("160","VTST0160","","D. DHANUSRI","","GURUSWAMI","","","","7382361746","","8 CLASS","A","","","","","","SOMALAREGADA","","","","",""),
("161","VTST0161","","V. BHAVYA SRI","","GOVINDHU","","","","6300117797","","8 CLASS","A","","","","","","NARAWADA","","","","",""),
("162","VTST0162","","K. SRAVYA","","MALLIKARJUNA REDDY","","","","6281331490","","8 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("163","VTST0163","","D. MADHU PRIYA","","MADHAVA","","","","9042794376","","8 CLASS","A","","","","","","BRAMESWRAM","","","","",""),
("164","VTST0164","","B. SINDHU BHARGAVI","","BRAMHANANDAM","","","","9493119066","","8 CLASS","A","","","","","","NARAWADA","","","","",""),
("165","VTST0165","","N. AKSHITHA","","BALA OBAIAH","","","","837472706","","8 CLASS","A","","","","","","NARAWADA","","","","",""),
("166","VTST0166","","G. ANJAN","","NARASIMHARAO","","","","9490170179","","8 CLASS","A","","","","","","DUTTALURU","","","","",""),
("167","VTST0167","","K. CHIRUVARDHAN","","PRABAKAR","","","","9492551001","","8 CLASS","A","","","","","","DUTTALURU","","","","",""),
("168","VTST0168","","G. CHRAN TEJA","","HEMANTH","","","","9441863742","","8 CLASS","A","","","","","","KAMMAVARI PALEM","","","","",""),
("169","VTST0169","","V.JAYAKAR REDDY","","MADHU","","","","9440420432","","8 CLASS","A","","","","","","MUTTARASI PALLI","","","","",""),
("170","VTST0170","","SK. NAZEER","","NAYAB  ","","","","8500129964","","8 CLASS","A","","","","","","KAMAVARI PALEM","","","","",""),
("171","VTST0171","","P.CHANANYA","","MALYADRI","","","","9346671897","","8 CLASS","A","","","","","","BRAMHANA PALLI","","","","",""),
("172","VTST0172","","R. KETHAN REDDY","","RAM MOHAN","","","","8367453559","","8 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("173","VTST0173","","K. MOHITH REDDY","","SRINIVAS REDDY","","","","91193482511","","8 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("174","VTST0174","","S. RAMCHRAN REDDY","","RAM CHANDRA","","","","7671854534","","8 CLASS","A","","","","","","DUTTALUR","","","","",""),
("175","VTST0175","","D. GOWTHAM ","","SUNKAIAH","","","","6305730788","","8 CLASS","A","","","","","","DUTTALUR","","","","",""),
("176","VTST0176","","N. NAGACHITHNYA","","NAGARAJU","","","","9542647738","","8 CLASS","A","","","","","","NARAWADA","","","","",""),
("177","VTST0177","","B. SAIKRISHANA ","","SUBBAREDDY","","","","7675871016","","8 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("178","VTST0178","","S. DEEKSHITH","","SRINIVASULU","","","","6362296590","","8 CLASS","A","","","","","","UMMAI PALLI","","","","",""),
("179","VTST0179","","E.KARTHIK","","BRAMHAYA","","","","9704097003","","8 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("180","VTST0180","","D.  NAGALOKESH","","VENKATA SUBHAIAH","","","","6300274055","","8 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("181","VTST0181","","R. SUBASH","","SURESH","","","","7093334502","","8 CLASS","A","","","","","","PEDAMACHUNURU","","","","",""),
("182","VTST0182","","R. SUSANTH","","NARESH","","","","6301812162","","8 CLASS","A","","","","","","PEDAMACHUNURU","","","","",""),
("183","VTST0183","","R. SUSANTH","","SRINIVASULU REDDY","","","","8897908300","","8 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("184","VTST0184","","D. VIVAEK","","VENKATA RATHNAM","","","","8074969210","","8 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("185","VTST0185","","SD. SADIYA","","NAWAZ","","","","9440160075","","8 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("186","VTST0186","","B. KARTHIKA","","MURALI ","","","","9100683980","","8 CLASS","A","","","","","","B.C.COLONY","","","","",""),
("187","VTST0187","","B.PANVIDATH","","NARAYANA","","","","9493827609","","8 CLASS","A","","","","","","B.C -COLONY","","","","",""),
("188","VTST0188","","K. AJAY","","LAKSHMAN","","","","8317541009","","8 CLASS","A","","","","","","B.C -COLONY","","","","",""),
("189","VTST0189","","SK. VAHID","","ABDUL KHADAR","","","","9000755605","","8 CLASS","A","","","","","","CHOWDA PALLI","","","","",""),
("190","VTST0190","","SK.AMZAD ALI","","MASTHAN ","","","","9676424620","","8 CLASS","A","","","","","","KRISHNAPURAM","","","","",""),
("191","VTST0191","","R.NAVADEEP","","OBUL REDDY","","","","8639055186","","8 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("192","VTST0192","","V.VARA PRASAD","","VARALU","","","","9652530776","","8 CLASS","A","","","","","","DUTTALUR","","","","",""),
("193","VTST0193","","P.VINOD","","VENKATESWARLU","","","","7483052435","","8 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("194","VTST0194","","S.JASWINI","","HAJARATH","","","","9347383616","","8 CLASS","A","","","","","","DUTTALUR","","","","",""),
("195","VTST0195","","K.VENELA","","VENGAIAH","","","","9542011821","","8 CLASS","A","","","","","","CHINAMACHANUR","","","","",""),
("196","VTST0196","","P.ESWARI TEJA","","VEERANJANEYULU","","","","7382652844","","8 CLASS","A","","","","","","DUTTALUR","","","","",""),
("197","VTST0197","","K.JAHNAVI","","SURESH","","","","8331940301","","8 CLASS","A","","","","","","KOTHAPETA","","","","",""),
("198","VTST0198","","CH. SRIKEERTHI","","RAMESH REDDY","","","","9390130803","","7 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("199","VTST0199","","B. DIVIJA","","VIJAY","","","","9440089867","","7 CLASS","A","","","","","","CHANNAMPALLI","","","","",""),
("200","VTST0200","","K. PRANATHI","","VENKATESWARLU","","","","6301334952","","7 CLASS","A","","","","","","BRAMHANAPALLI","","","","","");
INSERT INTO student_master_data VALUES
("201","VTST0201","","K. LASYA","","PRABAKAR REDDY","","","","9492575101","","7 CLASS","A","","","","","","DUTTALUR","","","","",""),
("202","VTST0202","","P.NITHYA SRI","","VENKATESWARLU","","","","7729098500","","7 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("203","VTST0203","","S. KEERTHANA","","RAGHU ","","","","7995880225","","7 CLASS","A","","","","","","YEPILAGUNTA","","","","",""),
("204","VTST0204","","R. YUVA SADHVIKA","","RAMMOHAN REDDY","","","","6302217395","","7 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("205","VTST0205","","B. VYSHNAVI","","ESWARREDDY","","","","6301333235","","7 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("206","VTST0206","","R. REKHA DEVI","","VENKATA RAMANAIAH","","","","6304129419","","7 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("207","VTST0207","","D. SUSMITHA","","RAMA SUBBAIAH","","","","9491372413","","7 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("208","VTST0208","","S. BHAVIGHNA","","RAGHU RAMI REDDY","","","","9666649197","","7 CLASS","A","","","","","","DUTTALUR","","","","",""),
("209","VTST0209","","U. NIHARIKA","","SRINIVAS","","","","9392281258","","7 CLASS","A","","","","","","GUVVADI","","","","",""),
("210","VTST0210","","T. NAGA VENKATA SUMA","","NAGESWAR RAO","","","","7815949324","","7 CLASS","A","","","","","","KOTHAPALLI","","","","",""),
("211","VTST0211","","CH. JYOSHNA","","LAKSHMAIAH","","","","9441533389","","7 CLASS","A","","","","","","MANGA PURAM","","","","",""),
("212","VTST0212","","R. SUMITRA","","CHANDHAN SINGH","","","","9440801553","","7 CLASS","A","","","","","","DUTTALUR CENTER","","","","",""),
("213","VTST0213","","CH. MOKSHITHA","","SRINIVASULU","","","","7330954202","","7 CLASS","A","","","","","","PEGALAPADU","","","","",""),
("214","VTST0214","","S. ASWINI","","SUBBAREDDY","","","","7680925702","","7 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("215","VTST0215","","N. REVANTH","","VENKATA KRISHNA","","","","9000668068","","7 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("216","VTST0216","","P. OMCHRAN","","OBAIAH","","","","9441372416","","7 CLASS","A","","","","","","DUTTALUR","","","","",""),
("217","VTST0217","","K. VENKATA SUDEEP REDDY","","NARAYAN REDDY","","","","9542251981","","7 CLASS","A","","","","","","DUTTALUR","","","","",""),
("218","VTST0218","","P. GOWTHAM","","RAMESH","","","","8688810835","","7 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("219","VTST0219","","D. VENKATA KRISHNA","","VENKATESH","","","","6301967083","","7 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("220","VTST0220","","CH. YUVARAJ","","SURESH","","","","9515451600","","7 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("221","VTST0221","","B. ADHITYA","","SUBBAREDDY","","","","9603021466","","7 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("222","VTST0222","","P. NIKHIL","","PRASAD BABU","","","","8500938826","","7 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("223","VTST0223","","T. GANGI REDDY","","GANGI REDDY","","","","8919735583","","7 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("224","VTST0224","","K. HEMA CHANDRA","","SRINIVASULU","","","","9493029442","","7 CLASS","A","","","","","","NANDIPADU","","","","",""),
("225","VTST0225","","SK. MOHAMMED ALI","","CHINNABIKARI","","","","9573656278","","7 CLASS","A","","","","","","BATA","","","","",""),
("226","VTST0226","","CH. KHAJA","","KAJA RAMTHULLA","","","","9491170111","","7 CLASS","A","","","","","","DUTTALUR BC COLONY","","","","",""),
("227","VTST0227","","G. SAI KRISHNA","","JANARDHAN RAO","","","","9494833256","","7 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("228","VTST0228","","G. DINESH","","VENKATESWARLU","","","","9381608260","","7 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("229","VTST0229","","A. JASWANTH REDDY","","VENKATA REDDY","","","","9347670259","","7 CLASS","A","","","","","","DUTTALUR","","","","",""),
("230","VTST0230","","R. SUKUMAR","","NARESH","","","","6301812162","","7 CLASS","A","","","","","","PEDHAMACHUNURU","","","","",""),
("231","VTST0231","","Y. VENKATA SAI","","PRASAD","","","","9490466644","","7 CLASS","A","","","","","","DUTTALUR","","","","",""),
("232","VTST0232","","G. MALLI KARJUNA","","VENKATESWARLU","","","","6301970143","","7 CLASS","A","","","","","","NANDUPADU","","","","",""),
("233","VTST0233","","Y. NAGA LOKESH","","SUBBARAYUDU","","","","9573815103","","7 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("234","VTST0234","","SK.SHOYAB","","KHAJA RASOOL","","","","9154639814","","7 CLASS","A","","","","","","NANDIPADU","","","","",""),
("235","VTST0235","","P. SUJIVARDHAN","","SUBBA REDDY","","","","7013085710","","7 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("236","VTST0236","","P. LALITH","","VENKATESWARLU","","","","9490099503","","7 CLASS","A","","","","","","NANDIPADU","","","","",""),
("237","VTST0237","","P. LOHITH","","VENKATESWARLU","","","","9490099503","","7 CLASS","A","","","","","","NANDIPADU","","","","",""),
("238","VTST0238","","Y. HEMANTH KUMAR","","VENKATA SUBBAIAH","","","","9014211640","","7 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("239","VTST0239","","E. MUNI TEJA","","SRINU","","","","6304242856","","7 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("240","VTST0240","","D. JASWANTH","","RAMANAIAH","","","","6305728661","","7 CLASS","A","","","","","","KOTHAPALLI","","","","",""),
("241","VTST0241","","P.ANVITHA","","ANKIREDDY","","","","9603020885","","7 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("242","VTST0242","","SK.RAFIYA KOUSAR","","MEERAVALI","","","","8008699343","","7 CLASS","A","","","","","","KAMMAVARIPALEM","","","","",""),
("243","VTST0243","","SD.THARJUMAHIYA","","USMAN ALI","","","","8247344386","","7 CLASS","A","","","","","","DASARA PALLI","","","","",""),
("244","VTST0244","","K.RUSHIKA","","SURESH","","","","8331940301","","7 CLASS","A","","","","","","KOTHAPETA","","","","",""),
("245","VTST0245","","SK.MAMMAHAD IRFAN","","KHANSA VALI","","","","9912222838","","7 CLASS","A","","","","","","BATA","","","","",""),
("246","VTST0246","","N.SANTHOSH","","SAMMAIAH","","","","","","7 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("247","VTST0247","","P. USHA TEJASWINI","","HAZARAT","","","","9177469451","","6 CLASS","A","","","","","","PETA","","","","",""),
("248","VTST0248","","U. SRI LEKHA","","SRINIVASULU","","","","9392281258","","6 CLASS","A","","","","","","GUVADI","","","","",""),
("249","VTST0249","","K. KAVYA","","MALLIKARJUNA","","","","6281331490","","6 CLASS","A","","","","","","BUDAVADA","","","","",""),
("250","VTST0250","","P. NIVEDITHA","","LAKSHMAIAH","","","","9963389090","","6 CLASS","A","","","","","","SOMALAREGADA","","","","",""),
("251","VTST0251","","P.NAGADEEPIKA","","NAGESHWAR","","","","9398229868","","6 CLASS","A","","","","","","UMAIPALLI","","","","",""),
("252","VTST0252","","K. V. MANVITHA","","K.SREENIVASA REDDY","","","","7893759496","","6 CLASS","A","","","","","","BUDHAWADA","","","","",""),
("253","VTST0253","","D. VAISHNAVI","","GURUSWAMY","","","","7382361746","","6 CLASS","A","","","","","","SOMALAREGADA","","","","",""),
("254","VTST0254","","S. K. RUKHEYA","","KHASIM","","","","9492680040","","6 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("255","VTST0255","","U. VANDANA","","OBULREDDY","","","","9493666098","","6 CLASS","A","","","","","","REDDLADINNE","","","","",""),
("256","VTST0256","","P. GEETHA MADURI","","VENKATA SUBAIAH","","","","9502191499","","6 CLASS","A","","","","","","SOMALREGADA","","","","",""),
("257","VTST0257","","S. D. JOYAL","","MASTHANVALI","","","","7032965320","","6 CLASS","A","","","","","","DUTTULUR","","","","",""),
("258","VTST0258","","P. VAISHANAVI","","VENKATESHWARLU","","","","8374004558","","6 CLASS","A","","","","","","KAMPASAMIDRAM","","","","",""),
("259","VTST0259","","P. NISHA","","PRASAD","","","","8500938826","","6 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("260","VTST0260","","P. AKSHARA","","HAZARATH","","","","9505815524","","6 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("261","VTST0261","","SK. ASIFA","","MHABOOB BASHA","","","","9959648920","","6 CLASS","A","","","","","","KRISHNAPURAM","","","","",""),
("262","VTST0262","","V. CHAVITHA","","MADHU","","","","9440420432","","6 CLASS","A","","","","","","MUTHRASPALLI","","","","",""),
("263","VTST0263","","V. SANKEERTHANA","","BRAMANANDHAN","","","","9493119066","","6 CLASS","A","","","","","","NARAWADA","","","","",""),
("264","VTST0264","","SK. NASEEMA","","KHAJARAMTHULLA","","","","6300481022","","6 CLASS","A","","","","","","VENKATAM PETA","","","","",""),
("265","VTST0265","","K. ROHIT","","VENKATESH","","","","","","6 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("266","VTST0266","","M.V.PRADEEP","","VASU DEVA REDDY","","","","934718425","","6 CLASS","A","","","","","","VENGANAPALEM","","","","",""),
("267","VTST0267","","E. SAHASRA","","NARESH","","","","9441055356","","6 CLASS","A","","","","","","NARAWADA","","","","",""),
("268","VTST0268","","D. SIVARAMKRISHNA","","KRISHNAMURTY","","","","9100294855","","6 CLASS","A","","","","","","CHINTHALAKUNTA","","","","",""),
("269","VTST0269","","R. SANJAY","","GURAVAIAH","","","","9347291608","","6 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("270","VTST0270","","G.ARYAN","","ANJANEYULU","","","","9014687738","","6 CLASS","A","","","","","","VENKATEMPETA","","","","",""),
("271","VTST0271","","P. HARSHA VARDHAN","","VEERA REDDY","","","","770390500","","6 CLASS","A","","","","","","NARAWADA","","","","",""),
("272","VTST0272","","S.CHARNESWAR","","CHANDRAKAMESWAR REDDY","","","","9515298170","","6 CLASS","A","","","","","","NADIPADU","","","","",""),
("273","VTST0273","","K. SARATH","","SASI","","","","9494318222","","6 CLASS","A","","","","","","DUTTALUR","","","","",""),
("274","VTST0274","","G.UDAYNATH","","VEERANARAYAN","","","","9492659592","","6 CLASS","A","","","","","","GUVADI","","","","",""),
("275","VTST0275","","G. SANDEEP","","SUBAREDDY","","","","9908476253","","6 CLASS","A","","","","","","DUTTALUR","","","","",""),
("276","VTST0276","","VM.VISHWESH","","GIRI  ","","","","9347900503","","6 CLASS","A","","","","","","DUTTALUR","","","","",""),
("277","VTST0277","","R. JASWANTH","","HAJARATH","","","","905221279","","6 CLASS","A","","","","","","BUDAWADA","","","","",""),
("278","VTST0278","","M. V. BHARATH","","MALAKONDARAIYUDU","","","","8500166882","","6 CLASS","A","","","","","","DUTTALUR","","","","",""),
("279","VTST0279","","D. V. SUSINDRA","","GURAVAIAH","","","","9490466611","","6 CLASS","A","","","","","","DUTTALUR","","","","",""),
("280","VTST0280","","V. CHETHAN KRISHNA","","VENKATNARAYANA","","","","7869449553","","6 CLASS","A","","","","","","KOTHAPALLI","","","","",""),
("281","VTST0281","","SK.JUBEER","","NAYAB","","","","8500129855","","6 CLASS","A","","","","","","KAMMAVARI PALEM","","","","",""),
("282","VTST0282","","P. GANESH","","VENKATA RAMU","","","","8985694731","","6 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("283","VTST0283","","B. SAKETH","","RAMESH","","","","9014424737","","6 CLASS","A","","","","","","SAMJEEVARAJUPALLI","","","","",""),
("284","VTST0284","","A. SUSHANTH","","NAGA RAJ","","","","9494142249","","6 CLASS","A","","","","","","DUTTALUR","","","","",""),
("285","VTST0285","","S. K. BHASHIDA","","KANSAVALI","","","","9959976081","","6 CLASS","A","","","","","","KAMAVARI PALEM","","","","",""),
("286","VTST0286","","P.GOVARDHAN REDDY","","SUDHAKAR","","","","7815871756","","6 CLASS","A","","","","","","SOMALREGADA","","","","",""),
("287","VTST0287","","D. THANISH","","SRINU","","","","9493234194","","6 CLASS","A","","","","","","DUTTULUR","","","","",""),
("288","VTST0288","","K.SIDDARAT","","LAKSHMAN","","","","8317541009","","6 CLASS","A","","","","","","DUTTALUR","","","","",""),
("289","VTST0289","","D.VIGNESHWAR REDDY","","CHENNAREDDY","","","","9492476522","","6 CLASS","A","","","","","","BUDAWADA","","","","",""),
("290","VTST0290","","B. RISHITHA","","SUBBAREDDY","","","","9000621496","","6 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("291","VTST0291","","G. ANGEL PRIYA","","NARAYANA","","","","9493914761","","6 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("292","VTST0292","","S. K. ARFAN","","KHAJA MOHIDDIN","","","","9177395452","","6 CLASS","A","","","","","","KHADIRENI PALLI","","","","",""),
("293","VTST0293","","S. K. SUMAIYA","","MASTHAN VALI","","","","9491833648","","6 CLASS","A","","","","","","DUTTALUR","","","","",""),
("294","VTST0294","","S.K .SUHANA","","RAFI","","","","7288052611","","6 CLASS","A","","","","","","DUTTALUR","","","","",""),
("295","VTST0295","","S.KEVIN","","RAGHU","","","","7995880225","","6 CLASS","A","","","","","","APILAGUNTA","","","","",""),
("296","VTST0296","","M.PRADEEP","","VASU","","","","9347184251","","6 CLASS","A","","","","","","VENGANAPALEM","","","","",""),
("297","VTST0297","","S.HEMA CHANDRA","","MOHAN","","","","9949225137","","6 CLASS","A","","","","","","JADADEVI","","","","",""),
("298","VTST0298","","S. BHAVITHA","","NAGARJUNA","","","","9618874272","","5 CLASS","A","","","","","","TEEDIPADU","","","","",""),
("299","VTST0299","","SK. SAMEERA","","KHAJARAMTHULLA","","","","9502498891","","5 CLASS","A","","","","","","NARRAWADA","","","","",""),
("300","VTST0300","","B. KRUTHIKA","","MURALIMOHAN REDDY","","","","9100683980","","5 CLASS","A","","","","","","DUTTALURU","","","","","");
INSERT INTO student_master_data VALUES
("301","VTST0301","","K. HARSHINI",""," VENKATESWARLU REDDY","","","","8897501375","","5 CLASS","A","","","","","","DUTTALURU","","","","",""),
("302","VTST0302","","SD. ANAS","","NAWAZ","","","","9398686009","","5 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("303","VTST0303","","K. SIVA TEJA","","OMKAR REDDY","","","","9491121501","","5 CLASS","A","","","","","","DUTTALUR","","","","",""),
("304","VTST0304","","SK.SHAHRUL HAMEED","","KHADAR BASHA","","","","7660853210","","5 CLASS","A","","","","","","DUTTALUR","","","","",""),
("305","VTST0305","","M. JAHNAVI","","NARAYANA","","","","9986752779","","5 CLASS","A","","","","","","DUTTALUR","","","","",""),
("306","VTST0306","","B. NAGA MOHITH","","NAGESWAR RAO","","","","6309638079","","5 CLASS","A","","","","","","NANDIPADU","","","","",""),
("307","VTST0307","","S. SREEJA","","RAMA RAO","","","","9441768202","","5 CLASS","A","","","","","","GUVVADI","","","","",""),
("308","VTST0308","","M. SAI ARCHANA","","CHIRANJIVI","","","","9849387998","","5 CLASS","A","","","","","","NARRAWADA","","","","",""),
("309","VTST0309","","CH. RUSHITESWARI","","BRAMHA REDDY","","","","9492935322","","5 CLASS","A","","","","","","ERRUKOLLU","","","","",""),
("310","VTST0310","","SK. MUSPLIKHA","","DAWOD","","","","9441523394","","5 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("311","VTST0311","","P.KEERTHI SRI","","MALYADRI","","","","9346671897","","5 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("312","VTST0312","","SK. NIYAZ","","NAYAB RASOOL","","","","9618671187","","5 CLASS","A","","","","","","NARAWADA","","","","",""),
("313","VTST0313","","SK. RIYAZ","","NAYAB RASOOL","","","","9381509088","","5 CLASS","A","","","","","","NARAWADA","","","","",""),
("314","VTST0314","","G. JASWANTH","","RAGAVENDRA RAO","","","","9491680279","","5 CLASS","A","","","","","","THEDDUPADU","","","","",""),
("315","VTST0315","","K. HANUSH","","SHYAM","","","","8179646570","","5 CLASS","A","","","","","","JADADEVI","","","","",""),
("316","VTST0316","","K. NAGA SWATHIK","","NAGARJUNA","","","","9014154329","","5 CLASS","A","","","","","","JADADEVI","","","","",""),
("317","VTST0317","","V. VENKATESH","","CHINNA","","","","7330739766","","5 CLASS","A","","","","","","NARAWADA","","","","",""),
("318","VTST0318","","P. DEEKSHITHA","","VENKATESWARLU","","","","9381508171","","5 CLASS","A","","","","","","KAMASAMUDRAM","","","","",""),
("319","VTST0319","","E. V. SWETHASRI","","RAMANAIAH","","","","8247422195","","5 CLASS","A","","","","","","MUTTARASU PALLI","","","","",""),
("320","VTST0320","","A. JANITHA","","SRINIVASULA REDDY","","","","8500014480","","5 CLASS","A","","","","","","KRISHANAPURAM","","","","",""),
("321","VTST0321","","PY. V. RUPA","","LAKSHMI NARYANA","","","","8500759520","","5 CLASS","A","","","","","","BRAHMHANAPALLI","","","","",""),
("322","VTST0322","","P. HARI PRIYA","","BALA KRISHANA","","","","8985976059","","5 CLASS","A","","","","","","NANDIPADU","","","","",""),
("323","VTST0323","","Y. V. RUPEESH","","LAKSHMI NARYANA","","","","8500759520","","5 CLASS","A","","","","","","BRAMANAPALLI","","","","",""),
("324","VTST0324","","D. THANAY","","VENKATESH","","","","6304772131","","5 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("325","VTST0325","","S. NAGENDRA","","VENKATA SUBBAIAH","","","","9376017074","","5 CLASS","A","","","","","","KANPASAMUDRAM","","","","",""),
("326","VTST0326","","P. NARASIMHA","","OBAIAH","","","","7093608016","","5 CLASS","A","","","","","","DUTTALURU","","","","",""),
("327","VTST0327","","SK. SOFIYA","","MASTHAN","","","","8985836052","","5 CLASS","A","","","","","","DUTTALURU","","","","",""),
("328","VTST0328","","D. VINITHYA","","SREENIVASULU","","","","9123405372","","5 CLASS","A","","","","","","KRISHANAPURAM","","","","",""),
("329","VTST0329","","SK. APSANA","","ALLABHAGASH","","","","9625473266","","5 CLASS","A","","","","","","LAKSHMI PURAM","","","","",""),
("330","VTST0330","","G. NAGA MANIKANTA","","NAGARAJU","","","","6305755428","","5 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("331","VTST0331","","P. RISHIVARDHAN","","SUBBA REDDY","","","","","","5 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("332","VTST0332","","SK. ABDUL REHMAN","","RAMTULLAH","","","","6300481022","","5 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("333","VTST0333","","S. DEEPAK","","RAMAKRISHNA","","","","","","5 CLASS","A","","","","","","DUTTALUR","","","","",""),
("334","VTST0334","","M. KUNDANA LAKSHMI","","LEELA PRASAD","","","","8185869007","","5 CLASS","A","","","","","","DUTTALUR","","","","",""),
("335","VTST0335","","Y. DEERAJ","","SIVA NAGESWAR RAO","","","","9866728938","","5 CLASS","A","","","","","","KRISHANAPURAM","","","","",""),
("336","VTST0336","","D. SATHWIK","","RAJA MOHAN","","","","9347216682","","5 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("337","VTST0337","","SK. KHAJAUSMAN","","MA BASHA","","","","9010785856","","5 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("338","VTST0338","","SK.ABDUL AZEEZ","","ALIABHAS","","","","9493238391","","5 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("339","VTST0339","","K.JHONSY LAKSHMI","","SIVARAMA KRISHNA","","","","7732076148","","5 CLASS","A","","","","","","BADVEL","","","","",""),
("340","VTST0340","","M. V. KEERTHI","","CH.VENKATA REDDY","","","","8688180576","","5 CLASS","A","","","","","","KRISHANAPURAM","","","","",""),
("341","VTST0341","","V. MEGHANA","","VENKATA NARAYANA","","","","7869449553","","5 CLASS","A","","","","","","KOTTAPALLI","","","","",""),
("342","VTST0342","","Y. YESHWANTH","","VENKATESWARLU","","","","7093083342","","5 CLASS","A","","","","","","KRISHANAPURAM","","","","",""),
("343","VTST0343","","N.  BALAJI","","VENKATESH","","","","8897535594","","5 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("344","VTST0344","","V. THARUN","","SRINADH","","","","8500010229","","5 CLASS","A","","","","","","MUTTARASU PALLI","","","","",""),
("345","VTST0345","","M. KARTHIKEYA","","VENKATARAMANA ","","","","9440108707","","5 CLASS","A","","","","","","KONDAREDDY PALLI","","","","",""),
("346","VTST0346","","B. GOWTHAM","","VENGHAIAH","","","","9494608441","","5 CLASS","A","","","","","","KOTTAPALLI","","","","",""),
("347","VTST0347","","J. ABHINASH","","SUDHAKAR","","","","7981973594","","5 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("348","VTST0348","","SD.SAJID","","SYDU","","","","","","5 CLASS","A","","","","","","B.C.COLONY","","","","",""),
("349","VTST0349","","SK.ARSHIYA","","KHANSA","","","","9912222838","","5 CLASS","A","","","","","","BATA","","","","",""),
("350","VTST0350","","SK.RUKHIYA","","KHANSAVALI","","","","","","5 CLASS","A","","","","","","BATA","","","","",""),
("351","VTST0351","","N.JASWANTH","","RAJA","","","","6374930211","","5 CLASS","A","","","","","","NAIDUPALLI","","","","",""),
("352","VTST0352","","SD.THOUHEED","","SHAMSHUR","","","","","","4 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("353","VTST0353","","N.  USHASRI","","SURESHKUMAR REDDY","","","","9515717043","","4 CLASS","A","","","","","","DUTTALUR","","","","",""),
("354","VTST0354","","D. AADYA REDDY","","VASU DEVA REDDY","","","","8985274900","","4 CLASS","A","","","","","","DUTTULURU","","","","",""),
("355","VTST0355","","SK.ALISHA","","RAFI","","","","674986014","","4 CLASS","A","","","","","","DUTTULUR","","","","",""),
("356","VTST0356","","M. ANNAPOORNA","","SRINIVASULU","","","","7032636654","","4 CLASS","A","","","","","","YEPILUNTA","","","","",""),
("357","VTST0357","","SD.UZHMA","","MASTHANAVALI","","","","","","4 CLASS","A","","","","","","DUTTULUR","","","","",""),
("358","VTST0358","","S. RAMA DEEKHA","","RAGHURAM REDDY","","","","9666507651","","4 CLASS","A","","","","","","DUTTULUR","","","","",""),
("359","VTST0359","","S. K. ALIYA","","BASHA","","","","9959648920","","4 CLASS","A","","","","","","KRISHANAPURAM","","","","",""),
("360","VTST0360","","S. RAHITHYA",""," RAVIKUMAR REDDY","","","","9441051806","","4 CLASS","A","","","","","","DUTTULUR","","","","",""),
("361","VTST0361","","S. RISHITHA","","RAVIKUMAR RADDY","","","","9441051806","","4 CLASS","A","","","","","","DUTULUR","","","","",""),
("362","VTST0362","","G. V. BRAHMANI","","KONDAIYA","","","","7036795278","","4 CLASS","A","","","","","","YESKULI","","","","",""),
("363","VTST0363","","S. K. DILKASH","","0","","","","","","4 CLASS","A","","","","","","KAMMAVARIPALLI","","","","",""),
("364","VTST0364","","K. SRICHANDANA","","BALAKRISHNA","","","","9441588850","","4 CLASS","A","","","","","","DUTTULUR","","","","",""),
("365","VTST0365","","CH.DHARMIKA","","THIRAPATHAIYA","","","","6305515430","","4 CLASS","A","","","","","","PEGALAPADU","","","","",""),
("366","VTST0366","","G. M. GREESHMA","","MADHU","","","","6301409183","","4 CLASS","A","","","","","","SOMALAREGADA","","","","",""),
("367","VTST0367","","S. D. REHAN","","SHAFI","","","","7893043274","","4 CLASS","A","","","","","","DASARPALLI","","","","",""),
("368","VTST0368","","G. NAGACHARAN","","SUBBAREDDY","","","","9908476253","","4 CLASS","A","","","","","","DUTTULUR","","","","",""),
("369","VTST0369","","M. HARSHA VARDHAN","","MALAKONDARAIDU","","","","8500166882","","4 CLASS","A","","","","","","DUTTULUR","","","","",""),
("370","VTST0370","","P. HEMANTH","","PRASAD","","","","7989265201","","4 CLASS","A","","","","","","REDDLADINNE","","","","",""),
("371","VTST0371","","P. JAI VARSHITH","","BALAKRISHNA","","","","8985976059","","4 CLASS","A","","","","","","NANDIPADU","","","","",""),
("372","VTST0372","","P. GURU DEEPAK","","RAMESH","","","","","","4 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("373","VTST0373","","KOUSHIK","","MALIKARJUN","","","","6281331490","","4 CLASS","A","","","","","","BUDAVADA","","","","",""),
("374","VTST0374","","D.SUDEEP","","RAMASUBBAIAH","","","","9491372413","","4 CLASS","A","","","","","","BRAMANAPALLI","","","","",""),
("375","VTST0375","","S. K. ANEEF","","BRAMHAIAH","","","","7337046775","","4 CLASS","A","","","","","","BRAMHANAPALLI","","","","",""),
("376","VTST0376","","P. MOSHE","","JOSHUVA","","","","8096249413","","4 CLASS","A","","","","","","DUTTULUR","","","","",""),
("377","VTST0377","","A.CHARAN","","VENKATESWARLU","","","","8008886472","","4 CLASS","A","","","","","","DUTTULUR","","","","",""),
("378","VTST0378","","L. TANJU","","RAVI ","","","","7671930007","","4 CLASS","A","","","","","","THIMMAPURAM","","","","",""),
("379","VTST0379","","G. DEVARSHINADH","","VEERA NARAYANA","","","","9492659592","","4 CLASS","A","","","","","","GUVADI","","","","",""),
("380","VTST0380","","T. MANO NEERAJ","","MADAVA","","","","9042794376","","4 CLASS","A","","","","","","BRAMHESWARAM","","","","",""),
("381","VTST0381","","P.AJITH","","GURUVA REDDY","","","","8096576912","","4 CLASS","A","","","","","","KAMAPASAMUDRAM","","","","",""),
("382","VTST0382","","K. VASU DEVAREDDY","","SUBBA REDDY","","","","766943348","","4 CLASS","A","","","","","","DUTTULUR","","","","",""),
("383","VTST0383","","M. VISHNU VARDHAN","","SUDHAKAR","","","","9701948686","","4 CLASS","A","","","","","","SOMALREGADA","","","","",""),
("384","VTST0384","","S.NAGA  KARTHIK","","NAGARJUNA","","","","9618874272","","4 CLASS","A","","","","","","TEDDIPADU","","","","",""),
("385","VTST0385","","R. SATHWIK","","GURAVAIAH","","","","9347281608","","4 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("386","VTST0386","","K. ROSHAN","","HAZARATH","","","","9392347492","","4 CLASS","A","","","","","","BRAMANAPALLI","","","","",""),
("387","VTST0387","","S. K. VAHEED","","NAYEB RASOOL","","","","949461550","","4 CLASS","A","","","","","","VENKATEMPETA","","","","",""),
("388","VTST0388","","D. MANASWIN","","SRINIVASULU","","","","93476587326","","4 CLASS","A","","","","","","VENKATEMPETA","","","","",""),
("389","VTST0389","","B. TEJA","","RAVI","","","","9493456899","","4 CLASS","A","","","","","","VENKATEMPETA","","","","",""),
("390","VTST0390","","CH. BHAVANA","","DHAYAKAR","","","","6304380375","","4 CLASS","A","","","","","","BRAMANAPALLI","","","","",""),
("391","VTST0391","","A. MIHIRA","","RAMAKRISHNA","","","","9014363480","","4 CLASS","A","","","","","","GUVADI","","","","",""),
("392","VTST0392","","SK.MOHAMMAD","","MAHABOOB MASTHAN","","","","","","4 CLASS","A","","","","","","B.C.COLONY","","","","",""),
("393","VTST0393","","P. LAKSHMI SAILAJA","","RONAIYA","","","","6304289911","","4 CLASS","A","","","","","","REDDALDINNE","","","","",""),
("394","VTST0394","","S. SRIYAN","","RAMARAO","","","","9441768202","","4 CLASS","A","","","","","","GUVADI","","","","",""),
("395","VTST0395","","M. NISHANTH","","PRASAD","","","","9390127553","","4 CLASS","A","","","","","","SOMALAREGADA","","","","",""),
("396","VTST0396","","K. BHAVYA SRI","","OMKAR RAMAKRISHNA REDDY","","","","9491121501","","3 CLASS","A","","","","","","DUTTULUR","","","","",""),
("397","VTST0397","","G. SAI VARSHITHA","","JANARDHAN RAO","","","","9949833256","","3 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("398","VTST0398","","S. BHARATH SIMHA REDDY","","GANGADHAR","","","","9441996366","","3 CLASS","A","","","","","","DUTTALUR","","","","",""),
("399","VTST0399","","Y.HARSHITH","","VENKATA SUBBAIAH","","","","6281265855","","3 CLASS","A","","","","","","KRISHNA PURAM","","","","",""),
("400","VTST0400","","SK.NAWAZ SHAREEF","","KHADAR MASTHAN","","","","7989424988","","3 CLASS","A","","","","","","LAKSHMI PURAM","","","","","");
INSERT INTO student_master_data VALUES
("401","VTST0401","","T. PRAVACHAN","","ANTONY","","","","8639694756","","3 CLASS","A","","","","","","VENGANNAPALEM","","","","",""),
("402","VTST0402","","T. NAGAVENKATA ULLAS","","NEGESWAR RAO","","","","7815949324","","3 CLASS","A","","","","","","KOTHAPALLI","","","","",""),
("403","VTST0403","","B. YOSHITH","","VENU GOPAL","","","","9441222275","","3 CLASS","A","","","","","","NANDIPADU","","","","",""),
("404","VTST0404","","S. NANDINI","","NAGENDRA","","","","7989862715","","3 CLASS","A","","","","","","VENKATAPURAM","","","","",""),
("405","VTST0405","","K. VYSHNA SREE","","RAMESH","","","","8008633140","","3 CLASS","A","","","","","","PETA","","","","",""),
("406","VTST0406","","D. DUHITHA","","OBUL REDDY","","","","8106537676","","3 CLASS","A","","","","","","DUTTALUR","","","","",""),
("407","VTST0407","","N. JAWANTH REDDY","","SURESH","","","","9515717043","","3 CLASS","A","","","","","","DUTTALUR","","","","",""),
("408","VTST0408","","SK. RIYAZ","","RIZWAN","","","","8520880419","","3 CLASS","A","","","","","","LAKSHMI PURAM","","","","",""),
("409","VTST0409","","P. VENKATA JITHIN","","VENKATESHWARULU","","","","8374004558","","3 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("410","VTST0410","","D. HEMANTH REDDY","","K.V. REDDY","","","","8897501375","","3 CLASS","A","","","","","","DUTTALUR","","","","",""),
("411","VTST0411","","B.HARINADH","","NARASHIMHA","","","","9492300059","","3 CLASS","A","","","","","","KAMAVARI PALEM","","","","",""),
("412","VTST0412","","M. JASWANTH","","CHIREENJEVI","","","","739676359","","3 CLASS","A","","","","","","NARRAWADA","","","","",""),
("413","VTST0413","","K. BENNY","","SAM","","","","8179646570","","3 CLASS","A","","","","","","JADADEVI","","","","",""),
("414","VTST0414","","CH. PRATEEK REDDY","","CH.RAJA","","","","6304130980","","3 CLASS","A","","","","","","BRAMANAPALLI","","","","",""),
("415","VTST0415","","V. SINDHUJA","","RAVANAIAH","","","","7013741519","","3 CLASS","A","","","","","","VENKATAPURAM","","","","",""),
("416","VTST0416","","M. SUMA","","SRINU","","","","9346866433","","3 CLASS","A","","","","","","VENKATAPURAM","","","","",""),
("417","VTST0417","","B. DEEKSHA MANASWINI","","RAJU","","","","7093063654","","3 CLASS","A","","","","","","SOMALAREGADA","","","","",""),
("418","VTST0418","","B.CHITHRA","","SEKHAR","","","","9490427987","","3 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("419","VTST0419","","P.YAGHNA SREE","","NAGESHWAR RAJU","","","","9652710366","","3 CLASS","A","","","","","","CHARUVUPALLI","","","","",""),
("420","VTST0420","","G.CHARU HASINI","","NARASHIMULU","","","","8520802477","","3 CLASS","A","","","","","","DUTTALURU","","","","",""),
("421","VTST0421","","D. ANIL","","SUNKAIAH","","","","6305730788","","3 CLASS","A","","","","","","DUTTALUR","","","","",""),
("422","VTST0422","","K. SURYA","","RAMESH","","","","7569741265","","3 CLASS","A","","","","","","DUTTALUR","","","","",""),
("423","VTST0423","","A. TENEETH ROYAL","","YEDUKONDALU","","","","9000058930","","3 CLASS","A","","","","","","CHERUVUPALLI","","","","",""),
("424","VTST0424","","C. PARDHASARADI","","PRABHAKAR","","","","","","3 CLASS","A","","","","","","NANDIPUDU","","","","",""),
("425","VTST0425","","P.THANVIK","","VEERANJANEYULU","","","","9100749989","","3 CLASS","A","","","","","","DUTTALUR","","","","",""),
("426","VTST0426","","M.SRINIVAS","","NAGESH","","","","6304954267","","3 CLASS","A","","","","","","VENKATAPURAM","","","","",""),
("427","VTST0427","","SK. RIYAZ","","RIZWAN","","","","8520880419","","3 CLASS","A","","","","","","LAKSHMIPURAM","","","","",""),
("428","VTST0428","","M. KESAVAPARDHU","","NARESH","","","","6303209734","","3 CLASS","A","","","","","","KRISHNAPURAM","","","","",""),
("429","VTST0429","","S. SAI KISHORE","","KOTESWAR RAO","","","","9949711692","","3 CLASS","A","","","","","","JADADEVI","","","","",""),
("430","VTST0430","","SD.HALIMA SADYA","","SAIDU","","","","9440166648","","3 CLASS","A","","","","","","DUTTALUR","","","","",""),
("431","VTST0431","","S.K REHANA","","RABBANI","","","","9908404676","","3 CLASS","A","","","","","","BATA","","","","",""),
("432","VTST0432","","D.GOWRI SHANKAR","","VENKATA SUBBAIAH","","","","","","3 CLASS","A","","","","","","T.N.PETA","","","","",""),
("433","VTST0433","","K. NITHYA","","KASI REDDY","","","","7382502947","","2 CLASS","A","","","","","","KONDAREDDYPALLI","","","","",""),
("434","VTST0434","","K. LAKSHMI JAGRUTHI","","BHASKER","","","","9154641900","","2 CLASS","A","","","","","","BUDAWADA","","","","",""),
("435","VTST0435","","M. HARSHITHA","","VENGALRAO","","","","9154639785","","2 CLASS","A","","","","","","MUTTARASU PALLI","","","","",""),
("436","VTST0436","","V. HARIKA","","SRI RAM","","","","","","2 CLASS","A","","","","","","MUTTARASU PALLI","","","","",""),
("437","VTST0437","","V. HANSIKA","","SURENDRA","","","","7670810732","","2 CLASS","A","","","","","","T.N.PETA","","","","",""),
("438","VTST0438","","V. HEMA SRI","","SARATH","","","","8985746919","","2 CLASS","A","","","","","","MUTTARASU PALLI","","","","",""),
("439","VTST0439","","SK. SUHANA","","RIZWAN","","","","8520880419","","2 CLASS","A","","","","","","LAKSHMI PURAM","","","","",""),
("440","VTST0440","","SK. RUKIYA","","NAWAZ","","","","8985700994","","2 CLASS","A","","","","","","DHASARA PALLI","","","","",""),
("441","VTST0441","","M. SRI RAM REDDY","","MAHESH","","","","9390898637","","2 CLASS","A","","","","","","KAMPASAMUDRAM","","","","",""),
("442","VTST0442","","N. YUTHES VISHNU","","DAMODAR RAO","","","","8008912468","","2 CLASS","A","","","","","","YERUKOLLU","","","","",""),
("443","VTST0443","","S. PAVAN",""," VENKATESH","","","","9392050759","","2 CLASS","A","","","","","","PEGALAPADU","","","","",""),
("444","VTST0444","","SK. AAYAN","","NAYAK JANEY","","","","7680050756","","2 CLASS","A","","","","","","VENKATAMPETA","","","","",""),
("445","VTST0445","","CH. VEDANTH","","RAVINDRA REDDY","","","","8374217441","","2 CLASS","A","","","","",""," KRISHNAPURAM","","","","",""),
("446","VTST0446","","JAI PRAKASH","","VENKATESHWARLU","","","","8096249413","","2 CLASS","A","","","","","","B/C COLONY","","","","",""),
("447","VTST0447","","SD. NIHAL","","BASHA","","","","7199306678","","2 CLASS","A","","","","","","DASARA PALLI","","","","",""),
("448","VTST0448","","D.RITISH CHANDRA","","CHANNA RAO","","","","8861196064","","2 CLASS","A","","","","","","MUTTARASU PALLI","","","","",""),
("449","VTST0449","","SK. ASHRAF","","SUNIL","","","","7095113640","","2 CLASS","A","","","","","","DUTTALUR","","","","",""),
("450","VTST0450","","VARUN","","MASTHAN ","","","","9963518568","","2 CLASS","A","","","","","","T.N.PETA","","","","",""),
("451","VTST0451","","Y. ANIL","","RAVI KUMAR","","","","6281919833","","2 CLASS","A","","","","","","AC COLONY","","","","",""),
("452","VTST0452","","S. GOWTHAMI","","RAMAKRISHNA","","","","7660892840","","2 CLASS","A","","","","","","DUTTALUR","","","","",""),
("453","VTST0453","","SD. RAHIL","","SHAHNAWAZ","","","","","","2 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("454","VTST0454","","SK. RUHEENA","","HUSSAIN","","","","9182187967","","2 CLASS","A","","","","","","BATA","","","","",""),
("455","VTST0455","","SD. MASHKUR","","USMAN","","","","8247344386","","2 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("456","VTST0456","","N. NISHITHA","","RAJA","","","","","","2 CLASS","A","","","","","","NAIDUPALLI","","","","",""),
("457","VTST0457","","E. V. RISAINYA","","RAMANAIAH","","","","","","2 CLASS","A","","","","","","MUTHRASPALLI","","","","",""),
("458","VTST0458","","CH. NARENDRA","","NAGARAJU","","","","","","2 CLASS","A","","","","","","B.C.COLONY","","","","",""),
("459","VTST0459","","KALYAN TEJ","","RAMESH","","","","8008633140","","2 CLASS","A","","","","","","T.N.PETA","","","","",""),
("460","VTST0460","","P. INDHU PRIYA","","HARIKRISHNA","","","","9491539456","","2 CLASS","A","","","","","","CHERUPALLI","","","","",""),
("461","VTST0461","","K.YASWANTH","","RAMANAREDDY","","","","9397942185","","1 CLASS","A","","","","","","BUNDAVADA","","","","",""),
("462","VTST0462","","B.YUVAN","","SHEKHAR REDDY","","","","8331077229","","1 CLASS","A","","","","","","YEPILAGUNTA","","","","",""),
("463","VTST0463","","SK.SUMAYA","","KHAJANAWAZ","","","","8985700995","","1 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("464","VTST0464","","CH.VENKATA MANVITH","","THIRAPATHAIAH","","","","6305515430","","1 CLASS","A","","","","","","PEGALLAPADU","","","","",""),
("465","VTST0465","","S.KARTHIK ","","VENKATARAMANAIAH","","","","8978146928","","1 CLASS","A","","","","","","BOYAMADUGU","","","","",""),
("466","VTST0466","","D.SATHWIK","","BALAIAH","","","","9391043031","","1 CLASS","A","","","","","","REDLADINI","","","","",""),
("467","VTST0467","","D.MOURYA","","VINODH","","","","8106267441","","1 CLASS","A","","","","","","DUTTALURU","","","","",""),
("468","VTST0468","","V.SAIMANVITHA","","ANIL","","","","9346856354","","1 CLASS","A","","","","","","KAMAVARI PALEM","","","","",""),
("469","VTST0469","","N.LITHIKA","","MADHUSUDHAN","","","","8106267441","","1 CLASS","A","","","","","","DUTTALUR","","","","",""),
("470","VTST0470","","K.NEHA","","KASIREDDY","","","","9392574725","","1 CLASS","A","","","","","","KONDAREDDY PALLI","","","","",""),
("471","VTST0471","","ASHWITHA","","VISHNUVARDHAN","","","","6281840958","","1 CLASS","A","","","","","","BRAMHESWARAM","","","","",""),
("472","VTST0472","","P.MANOVIGNAN","","LAKSHMAIAH","","","","9963389090","","1 CLASS","A","","","","","","SOMALAREGADA","","","","",""),
("473","VTST0473","","M.LASYA","","GIRISHKUMAR","","","","9347900503","","1 CLASS","A","","","","","","DUTTALUR","","","","",""),
("474","VTST0474","","SK.NOUSHEEN","","SHABEER","","","","9985598806","","1 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("475","VTST0475","","SAHITH","","SRINIVASULU","","","","9110753914","","1 CLASS","A","","","","","","SOMALREGADA","","","","",""),
("476","VTST0476","","R.MOKSHITH","","NARAYANA","","","","6300233498","","1 CLASS","A","","","","","","SINGANAPALLI","","","","",""),
("477","VTST0477","","N.NITHYASREE","","DATHU","","","","7989916314","","1 CLASS","A","","","","","","GUVVADI","","","","",""),
("478","VTST0478","","P.NITHISH","","RAVI","","","","9848726688","","1 CLASS","A","","","","","","KAMPASAMUDAM","","","","",""),
("479","VTST0479","","M.LAKSHMI THANUJA","","MALAKONDAIAH","","","","9008792108","","1 CLASS","A","","","","","","KONDAREDDY PALLI","","","","",""),
("480","VTST0480","","M.NAGA JASWANTH","","NARAYANA","","","","9611338828","","1 CLASS","A","","","","","","SOMALAREGUDA ","","","","",""),
("481","VTST0481","","SD.ROSHAN","","SHANAWAZ","","","","7989700683","","1 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("482","VTST0482","","SD.MOBISIRA","","JABID","","","","8639975394","","1 CLASS","A","","","","","","DASARAPALLI","","","","",""),
("483","VTST0483","","P.VENKATA SATHISH","","GOPI","","","","6300236221","","1 CLASS","A","","","","","","MANGA PURAM","","","","",""),
("484","VTST0484","","SK.ASHISH","","KHADAR MASTHAN","","","","9493021004","","1 CLASS","A","","","","","","B.C.COLONY","","","","",""),
("485","VTST0485","","V.ABHIRAM","","ANJAIAH","","","","9640469956","","UKG","A","","","","","","KAMMAVARI PALEM","","","","",""),
("486","VTST0486","","SK.SUFIYAN","","MASTHAN ALI","","","","8330957493","","UKG","A","","","","","","B.C.COLONY","","","","",""),
("487","VTST0487","","PRUDHVI","","RAMANAIAH","","","","6304289911","","UKG","A","","","","","","REDLADINNE","","","","",""),
("488","VTST0488","","SANDEEP KUMAR","","BASKAR REDDY","","","","7036855251","","UKG","A","","","","","","DUTTALURU","","","","",""),
("489","VTST0489","","FAYAZ","","","","","","","","UKG","A","","","","","","NARAWADA","","","","",""),
("490","VTST0490","","PRABHA","","RAMESH","","","","9391135309","","UKG","A","","","","","","VENKATAMPETA","","","","",""),
("491","VTST0491","","MEGHAVARSHINI","","MALA KONDAIAH","","","","9032835283","","UKG","A","","","","","","MANGAPURAM","","","","",""),
("492","VTST0492","","SK.JASHMA","","BABU","","","","8500008646","","UKG","A","","","","","","KAMMAVARI PALEM","","","","",""),
("493","VTST0493","","D.VEDHYA","","SREENU","","","","9347658732","","UKG","A","","","","","","VENKATAMPETA","","","","",""),
("494","VTST0494","","R.HANVIKA","","SUDHAKAR","","","","9014291072","","UKG","A","","","","","","SINGANAPALLI","","","","",""),
("495","VTST0495","","N.PRAGNA","","PENCHALANARSAIAH","","","","8328078035","","UKG","A","","","","","","NANDIPADU","","","","",""),
("496","VTST0496","","P.HEMALATHA","","VEKATESHWARLU","","","","7569642959","","UKG","A","","","","","","REDLADINNE","","","","",""),
("497","VTST0497","","RIYA MEHFIL","","KHADER BASHA","","","","7660853210","","UKG","A","","","","","","DUTTALUR","","","","",""),
("498","VTST0498","","MEGHANSH","","SUBBAREDDY","","","","9398554430","","UKG","A","","","","","","SOMALAREGADA","","","","",""),
("499","VTST0499",""," NITHYA",""," NAGARJUNA","","","","8125684797","","UKG","A","","","","","","NANDIPADU","","","","",""),
("500","VTST0500","","ANJITHA","","PRATHAP","","","","7731917244","","UKG","A","","","","","","DUTTALUR","","","","","");
INSERT INTO student_master_data VALUES
("501","VTST0501","","MANVITH","","PRASAD","","","","7989265201","","UKG","A","","","","","","REDLADINNE","","","","",""),
("502","VTST0502","","CHANDRA ADHITHYA","","RAMARAO","","","","7010154685","","UKG","A","","","","","","VENGANAPALEM","","","","",""),
("503","VTST0503","","B.PARDHIV","","MANOJ","","","","9000617716","","UKG","A","","","","","","  NARRAWADA","","","","",""),
("504","VTST0504","","CH.MANIDEEP","","KAMESHWARAA","","","","7095229431","","UKG","A","","","","","","THEDDUPADU","","","","",""),
("505","VTST0505","","A.MOKSHITH REDDY","","SRINIVASULU REDDY","","","","8500014480","","UKG","A","","","","","","KRISHNA PURAM","","","","",""),
("506","VTST0506","","P.POORVIKA","","NARAYANA","","","","6281498841","","UKG","A","","","","","","YERUKOLLU","","","","",""),
("507","VTST0507","","R.DANIEL","","RAMESH","","","","7032652714","","UKG","A","","","","","","VENKATAM PETA","","","","",""),
("508","VTST0508","","SK.HAZEER","","ABDUL RASHEED","","","","7702524212","","UKG","A","","","","","","B.C.COLONY","","","","",""),
("509","VTST0509","","SK.ANAS","","ABDUL SHAMED","","","","8297114001","","UKG","A","","","","","","B.C.COLONY","","","","",""),
("510","VTST0510","","D.VIJAY KRISHNA","","GURUSWAMI","","","","9505736167","","UKG","A","","","","","","VENGANNAPALEM","","","","",""),
("511","VTST0511","","SD.RUIKYA","","JABIR","","","","8639975394","","UKG","A","","","","","","DASARAPALLI","","","","",""),
("512","VTST0512","","K.KUSHI","","DATHU","","","","8106428807","","UKG","A","","","","","","B.C.COLONY","","","","",""),
("513","VTST0513","","M.LOHITH","","RAGHU","","","","9441232307","","UKG","A","","","","","","VENGANNAPALEM","","","","",""),
("514","VTST0514","","P.SADIK","","KASIM","","","","9492680040","","UKG","A","","","","","","SINGANAPALLI","","","","",""),
("515","VTST0515","","SD.SHARMIN","","SHARI","","","","","","UKG","A","","","","","","DASERAPALLEM","","","","",""),
("516","VTST0516","","THANEESH","","BALAIAH","","","","9391043031","","UKG","A","","","","","","REDDLADINNE","","","","",""),
("517","VTST0517","","YOGENDRA","","SARASWATHI","","","","6300383366","","LKG","A","","","","","","KRISHNA PURAM","","","","",""),
("518","VTST0518","","E.ISHANK","","VENKATA RATNAM SUSMITHA","","","","8919946136","","LKG","A","","","","","","NARAWADA","","","","",""),
("519","VTST0519","","BHAVADISH","","MADHAVA RAO","","","","9989713647","","LKG","A","","","","","","KANCHERUVU","","","","",""),
("520","VTST0520","","ADVIK","","KARTHIK","","","","9989312332","","LKG","A","","","","","","SINGANAPALLI","","","","",""),
("521","VTST0521","","VARSHITH","","PRATHAP REDDY","","","","7731917244","","LKG","A","","","","","","DUTTALURU","","","","",""),
("522","VTST0522","","G.VIHAN","","CHENNAKRISHNA","","","","9398020589","","LKG","A","","","","","","YEPILAGUNTA","","","","",""),
("523","VTST0523","","SK.HYDERALI","","ALVI","","","","","","LKG","A","","","","","","SINGANAPALLI","","","","",""),
("524","VTST0524","","NAVA DEEPU","","RAJAMOHAN","","","","9866505556","","LKG","A","","","","","","SINGANAPALLI","","","","",""),
("525","VTST0525","","N.NAGA SUSHANTH","","NAGENDRA BABU","","","","9666813104","","LKG","A","","","","","","NARRAWADA","","","","",""),
("526","VTST0526","","NEELA BRUHADEESH","","SURENDRA SUBHASINI","","","","9989510335","","LKG","A","","","","","","T.N.PETA","","","","",""),
("527","VTST0527","","ISHAD","","","","","","","","LKG","A","","","","","","B.C.COLONY","","","","",""),
("528","VTST0528","","ISHAN","","","","","","","","LKG","A","","","","","","B.C.COLONY","","","","",""),
("529","VTST0529","","MAHANTH KESAVA","","CHANDRA MOULI","","","","9392507458","","LKG","A","","","","","","BRAHMESWARAM","","","","",""),
("530","VTST0530","","SHARANYA","","MANOHAR SUDHA","","","","9490084481","","LKG","A","","","","","","BRAMHANAPALLI","","","","",""),
("531","VTST0531","","HANVITHA","","VENKATA SUBBAIAH","","","","9704441174","","LKG","A","","","","","","SINGANAPALLI","","","","",""),
("532","VTST0532","","CHAITHRA SAMYUKTHA","","VENKATESH","","","","","","LKG","A","","","","","","ERUKOLLU","","","","",""),
("533","VTST0533","","JYOSHANA","","VENGALRAO","","","","","","LKG","A","","","","","","ERUKOLLU","","","","",""),
("534","VTST0534","","CH.LAKSHMI","","SRINIVASULU REDDY","","","","8688869093","","LKG","A","","","","","","ERUKOLLU","","","","",""),
("535","VTST0535","","LOUKIKYA","","RAVI","","","","767193007","","LKG","A","","","","","","THIMAPURAM","","","","",""),
("536","VTST0536","","RUKSANA","","RABBANI","","","","9908404676","","LKG","A","","","","","","BATA","","","","",""),
("537","VTST0537","","FAIZAL","","","","","","","","LKG","A","","","","","","B.C.COLONY","","","","",""),
("538","VTST0538","","ATHARAV","","RAMU","","","","9014363480","","LKG","A","","","","","","GUVVADI","","","","",""),
("539","VTST0539","","SK.SAMMU","","NAYAB RASOOL","","","","6303715371","","LKG","A","","","","","","SIMGANAPALLI","","","","",""),
("540","VTST0540","","NAGA MANVITH","","NAGARJUNA","","","","8125684797","","LKG","A","","","","","","NANDIPADU","","","","",""),
("541","VTST0541","","SD.SADIYA","","KHAJA MAHABAAS","","","","9381047758","","LKG","A","","","","","","LAKSHMI PURAM","","","","",""),
("542","VTST0542","","D.MAHADEV","","VENKATA RAMANAIAH","","","","9063307564","","LKG","A","","","","","","VENKATAMPETA","","","","",""),
("543","VTST0543","","P.NAGACHARITHA","","RAMESH","","","","9959959409","","LKG","A","","","","","","VENKATAPURAM","","","","",""),
("544","VTST0544","","MANHA","","","","","","8688761758","","LKG","A","","","","","","VENKATAMPETA","","","","",""),
("545","VTST0545","","SD.ROMON","","JABBIN","","","","8639975394","","LKG","A","","","","","","DASARAPALLI","","","","",""),
("546","VTST0546","","SK.HEENA","","NAYAB RASOOL","","","","9494615503","","LKG","A","","","","","","VENKATAMPETA","","","","",""),
("547","VTST0547","","SK.RAYAN","","SHANAWAZ","","","","","","LKG","A","","","","","","DASARAPALLI","","","","",""),
("548","VTST0548","","SD.FAHAD","","","","","","","","LKG","A","","","","","","DASARAPALLI","","","","",""),
("549","VTST0549","","N.VEDHANSH","","NARASA REDDY","","","","8332807049","","LKG","A","","","","","","DUTTALUR","","","","",""),
("550","VTST0550","","CH.TEJESWINI","","RAMESH","","","","8669008427","","LKG","A","","","","","","VENKATAMPETA","","","","",""),
("551","VTST0551","","ASHA","","","","","","","","LKG","A","","","","","","B.C.COLONY","","","","",""),
("552","VTST0552","","ATHARV","","RAMU","","","","9014363480","","LKG","A","","","","","","GUVVADI","","","","","");




CREATE TABLE `tran_details` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `AC_No` varchar(15) NOT NULL,
  `Amount` varchar(15) NOT NULL DEFAULT '0',
  `DOP` varchar(20) NOT NULL DEFAULT '0',
  `Bill_No` varchar(15) NOT NULL DEFAULT '0',
  `Purpose` varchar(70) NOT NULL DEFAULT '0',
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;






CREATE TABLE `van_route` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Van_Route` varchar(50) NOT NULL,
  PRIMARY KEY (`S_No`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO van_route VALUES
("1","CHABOLU"),
("2","BRAMHNAPALLI"),
("3","KAMPASAMUDRAM"),
("4","KRISHNAPURAM"),
("5","UMMAYAPALLI"),
("6","PEGALLAPADU"),
("7","BUDHAWADA"),
("8","APILAGUNTA"),
("9","NANDIPADU"),
("10","VENKATAMPETA"),
("11","SRIRAMNAGAR"),
("12","REDLADINNE"),
("13","PEDAMACHANURU"),
("14","CHINAMACHANURU"),
("15","NAGARAJUPADU"),
("16","VENGAMPALLI"),
("17","TIMMAPURAM"),
("18","VENGANNAPALEM"),
("19","KOTHAPETA"),
("20","VADDIPALEM"),
("21","NARRAWADA"),
("22","TEDDUPADU"),
("23","M N PALLI"),
("24","APPASAMUDRAM"),
("25","SOMALAREGADA"),
("26","DASARAPALLI"),
("27","DUTTALUR"),
("28","LAKSHMIPURAM"),
("29","K V PALEM"),
("30","BRAMHESWARAM"),
("31","YERUKOLLU");




CREATE TABLE `working_days` (
  `S_No` int(11) NOT NULL AUTO_INCREMENT,
  `Month` varchar(30) NOT NULL,
  `Working_Days` int(11) DEFAULT 0,
  PRIMARY KEY (`S_No`),
  UNIQUE KEY `Month` (`Month`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




