drop database if exists talent_exchange;
create database talent_exchange;
use talent_exchange;

create table info (
    username varchar(30),
    bio varchar(100),
    gender varchar(5),
    age int,
    img varchar(100),
    contact varchar(8),
    talent_cat varchar(100),
    skill varchar(100),
    yr_exp int,
    youtube varchar(100),
    postal int(8),
    unit varchar(20),
    email varchar(30),
    firstname varchar(30),
    lastname varchar(30),
    addr varchar(100),
    region varchar(30),
    country varchar(30),
    occupation varchar(100),
    prevschool varchar(100)
);
-- talent_cat: music, art&design, dance, sports, language， IT, cooking, OTHER
insert into info values ('Selena', 'I am pretty! ','f', 45,'selena.jpg', '92231030','music','singing',10,'UCLVFgFjAIa1EowYmR7knXUw','248644','#01-12', 'selena123@gmail.com','Selena','Gomez','Orchard Boulevard','Central','Singapore','Actress','National University of Singapore');
insert into info values ('Justin', 'King of fishing.','m', 31,'justin.jpg', '87320948','other','fishing',5,'UCLVFgFjAIa1EowYmR7knXUw','389233','#02-05', 'kidrauhl223@gmail.com','Justin','Bieber','149 Geylang Road','East','Singapore','Singapore','National University of Singapore');
insert into info values ('Britney', 'Dance like a star','f', 60, 'britney.jpg','90912744','dance','dancing',20,'UCLVFgFjAIa1EowYmR7knXUw','640492','#01-33', 'britneybish@gmail.com','Britney','Spears','492 Jurong West Street 41','West','Singapore','Dancer','National University of Singapore');
insert into info values ('Rachel', 'I am smart! ','f', 17,'Rachel.jpg', '93107637','cooking','baking',10,'UCLVFgFjAIa1EowYmR7knXUw','466402','#02-04', 'rachel22@gmail.com','Rachel','Green','214 Upper East Coast Road','East','Singapore','Patissier','AllSpice Institute');
insert into info values ('Supreme Leader', 'I am the absolute! ','f', 18,'Supreme_Leader.jpg', '90374908','IT','coding',10,'UCLVFgFjAIa1EowYmR7knXUw','538719','#16-01', 'thesupremeleader@gmail.com','Supreme','Leader','21 Hougang Street 51','North-East','Singapore','Professor','Harvard University');
insert into info values ('YiMeng', 'I am the best! ','f', 21,'YiMeng.jpg', '99670217','cooking','baking',10,'UCLVFgFjAIa1EowYmR7knXUw','188021','#14-59', 'yimeng@gmail.com','Yi','Meng','200 Victoria Street','Central','Singapore','Patissier','At-Sunrice GlobalChef Academy');
insert into info values ('Najulah', 'I am awesome! ','m', 18,'Najulah.jpg', '99025104','art&design','sewing',10,'UCLVFgFjAIa1EowYmR7knXUw','730304','#12-34', 'najulah11@gmail.com','Mohamed','Najulah','304 Woodlands Street 31','North','Singapore','Seamstress','Singapore Management University');
insert into info values ('Sarah', 'I am wonderful! ','f', 25,'Sarah.jpg', '94981374','dance','dancing',10,'UCLVFgFjAIa1EowYmR7knXUw','387382','#06-522', 'sarahsmiles@gmail.com','Sarah','Tan','601 Sims Drive','East','Singapore','Dancer','National University of Singapore');
insert into info values ('Josh', 'I am handsome! ','m', 45,'Josh.jpg', '91456145','cooking','baking',10,'UCLVFgFjAIa1EowYmR7knXUw','179097','#43-21', 'joshywoshy@gmail.com','Joshua','Boo','109 North Bridge Road','Central','Singapore','Patissier','AllSpice Institute');
insert into info values ('Trinny', 'I am fun! ','f', 55,'Trinny.jpg', '94403012','cooking','cooking',10,'UCLVFgFjAIa1EowYmR7knXUw','508988','#08-09', 'trinidad@gmail.com','Trina','Vega','25 Loyang Crescent','East','Singapore','Head Chef','Asian Culinary Institute Singapore');
insert into info values ('Michael', 'I am nice! ','m', 67,'Micheal.jpg', '91370788','music','cello',10,'UCLVFgFjAIa1EowYmR7knXUw','439584','#01-01', 'mikey44@gmail.com','Michael','Goh','51 Branksome Road','East','Singapore','Cellist','School of the Arts Singapore');
insert into info values ('Christal', 'I am good at learning! ','f', 56,'Christal.jpg', '97445196','music','violin',10,'UCLVFgFjAIa1EowYmR7knXUw','415933','#05-05', 'christal3092@gmail.com','Christal','Lim','23 Kaki Bukit Avenue','East','Singapore','Violinist','Nanyang Academy of Fine Arts');
insert into info values ('Jack', 'I am looking for my beanstalk! ','m', 17,'Jack.jpg', '90726463','music','bass',10,'UCLVFgFjAIa1EowYmR7knXUw','058822','#07-322', 'jackjack@gmail.com','Jack','Lim','273C South Bridge Road','Central','Singapore','Bassist','Nanyang Technological University');
insert into info values ('Molly', 'My beauty is intoxicating', 'f', 25, 'Molly.jpg', '86662789', 'dance', 'ballet', 5, 'UCLVFgFjAIa1EowYmR7knXUw', '159952', '#01-32', 'molly887@gmail.com','Molly','Cyrus','368 Alexandra Road','West','Singapore','Ballet Dancer','Nanyang Academy of Fine Arts');
insert into info values ('Jason', 'Am the coolest dude in town', 'm', 38, 'Jason.jpg', '95567892', 'music', 'singing', 11, 'UCLVFgFjAIa1EowYmR7knXUw', '540118', '#12-32', 'notjasonderulo@gmail.com','Jason','Tan','118 Rivervale Drive','North-East','Singapore','Singer','Nanyang Technological University');
insert into info values ('Demi', 'This is real, this is me', 'f', 31, 'Demi.jpg', '98892734', 'music', 'singing', 11, 'UCLVFgFjAIa1EowYmR7knXUw', '120431', '#01-661', 'demetrialim@gmail.com','Demetria','Lim','431 Clementi Avenue  3','West','Singapore','Singer','National University of Singapore');
insert into info values ('Monica', 'Marie Kondo was my disciple', 'f', 40, 'Monica.jpg', '87798854', 'other', 'cleaning', 10, 'UCLVFgFjAIa1EowYmR7knXUw', '757695', '#08-991', 'monicagellz@gmail.com','Monica','Bing','10 Admiralty Street','North','Singapore', 'Actress','National University of Singapore');
insert into info values ('Joey', 'Ola, soy Joey!', 'm', 45, 'Joey.jpg', '98779002', 'language', 'spanish', 5, 'UCLVFgFjAIa1EowYmR7knXUw', '534785', '#06-02', 'jomigo@gmail.com','Joey','Tribbiani','41189 Upper Serangoon Road','North-East','Singapore','Translator','National University of Singapore');
insert into info values ('Phoebe', 'The lyricist responsible for chart topper Smelly Cat', 'f', 40, 'Phoebe.jpg', '98890023', 'music', 'composing', 6, 'UCLVFgFjAIa1EowYmR7knXUw', '408564', '#11-22', 'smellycat@gmail.com','Phoebe','Buffay','10 Ubi Crescent','East','Singapore','Songwriter','School of the Arts Singapore');
insert into info values ('Ross', 'The hopeless romantic', 'm', 45, 'Ross.jpg', '91123356', 'cooking', 'baking', 3, 'UCLVFgFjAIa1EowYmR7knXUw', '508820', '#01-01', 'rossgellz@gmail.com','Ross','Geller','20 Loyang Terrace','East','Singapore','Baker','National University of Singapore');
insert into info values ('Chandler', 'The perfect combination of handsome and funny!', 'm', 45, 'Chandler.jpg', '93346121', 'other', 'comedian', 9, 'UCLVFgFjAIa1EowYmR7knXUw', '609649', '#16-711', 'madmanchandler@gmail.com','Chandler','Bing','No 3 Jurong West Street 1','West','Singapore','Comedian','Nanyang Technological University');
insert into info values ('Ted', 'Aspiring architect', 'm', 42, 'Ted.jpg', '87794420', 'art&design', 'drawing', 11, 'UCLVFgFjAIa1EowYmR7knXUw', '538747', '#08-080', 'mosbydesigns@gmail.com','Ted','Mosby','10 Buangkok View','North-East','Singapore','Architect','National University of Singapore');
insert into info values ('Katy', 'I kissed a girl and i liked it', 'f', 32, 'Katy.jpg', '99662551', 'music', 'singing', 10, 'UCLVFgFjAIa1EowYmR7knXUw', '824196', '#09-993', 'perrytheplatypus@gmail.com','Katy','Perry','196D Punggol Field','North-East','Singapore','Singer','National University of Singapore');

-- Check how to give rating to the user
create table rating (
    username varchar(30),
    commenter varchar(30),
    rating int,
    description varchar(200),
    postDate DATE
);


insert into rating values ('Selena','Britney', '5', 'Selena is verrrry nice. Thank you Selena!!!',CURRENT_DATE);
insert into rating values ('Selena','Justin', '4', 'Selena is verrrry nice. Thank you Selena!!!',CURRENT_DATE);
insert into rating values ('Selena','Britney', '5', 'Selena is verrrry nice. Thank you Selena!!!',CURRENT_DATE);
insert into rating values ('Selena','Britney', '5', 'Selena is verrrry nice. Thank you Selena!!!',CURRENT_DATE);
insert into rating values ('Selena', 'Najulah', '4', 'I want her 2!',CURRENT_DATE);
insert into rating values ('Selena', 'Mike', '4', 'I need him 1!',CURRENT_DATE);
insert into rating values ('Selena', 'YiMeng', '5', 'I need him 2!',CURRENT_DATE);
insert into rating values ('YiMeng', 'Supreme Leader', '3', 'I need him 3!',CURRENT_DATE);
insert into rating values ('Justin', 'Katy','5', 'Boring. He dont allow me to talk during fishing',CURRENT_DATE);
insert into rating values ('Justin', 'Katy','5', 'Boring. He dont allow me to talk during fishing',CURRENT_DATE);
insert into rating values ('Justin', 'Katy','4', 'Boring. He dont allow me to talk during fishing',CURRENT_DATE);
insert into rating values ('Justin', 'Katy','5', 'Boring. He dont allow me to talk during fishing',CURRENT_DATE);
insert into rating values ('Britney', 'Najulah', '5', 'She is so Nice!',CURRENT_DATE);
insert into rating values ('Britney', 'Najulah', '4', 'She is so Nice!',CURRENT_DATE);
insert into rating values ('Britney', 'Najulah', '5', 'She is so Nice!',CURRENT_DATE);
insert into rating values ('Supreme Leader','YiMeng', '4', 'I like her 1!',CURRENT_DATE);
insert into rating values ('Supreme Leader', 'Najulah', '5', 'I like her 2!',CURRENT_DATE);
insert into rating values ('YiMeng', 'Najulah', '5', 'I want her 2!',CURRENT_DATE);
insert into rating values ('YiMeng', 'Mike', '5', 'I need him 1!',CURRENT_DATE);
insert into rating values ('YiMeng', 'YiMeng', '5', 'I need him 2!',CURRENT_DATE);
insert into rating values ('YiMeng', 'Supreme Leader', '3', 'I need him 3!',CURRENT_DATE);
insert into rating values ('YiMeng', 'Selena', '5', 'I need him 4!',CURRENT_DATE);
insert into rating values ('YiMeng', 'Justin', '4', 'I need him 5!',CURRENT_DATE);
insert into rating values ('Najulah', 'Britney', '5', 'I need him 6!',CURRENT_DATE);
insert into rating values ('Najulah', 'Mike', '5', 'I need him 1!',CURRENT_DATE);
insert into rating values ('Najulah', 'YiMeng', '5', 'I need him 2!',CURRENT_DATE);
insert into rating values ('Najulah', 'Supreme Leader', '3', 'I need him 3!',CURRENT_DATE);
insert into rating values ('Najulah', 'Selena', '5', 'I need him 4!',CURRENT_DATE);
insert into rating values ('Najulah', 'Justin', '4', 'I need him 5!',CURRENT_DATE);
insert into rating values ('Najulah', 'Britney', '5', 'I need him 6!',CURRENT_DATE);



create table favorite (
    username varchar(30),
    favUser varchar(30),
    postDate DATE
);

insert into favorite values ('Mike','selena', CURRENT_DATE);
insert into favorite values ('Mike','Yi Meng', CURRENT_DATE);
insert into favorite values ('Mike','Supreme Leader', CURRENT_DATE);
insert into favorite values ('Mike','justin', CURRENT_DATE);
insert into favorite values ('britney','selena', CURRENT_DATE);
insert into favorite values ('britney','selena', CURRENT_DATE);
insert into favorite values ('britney','Yi Meng', CURRENT_DATE);
insert into favorite values ('britney','Supreme Leader', CURRENT_DATE);
insert into favorite values ('britney','justin', CURRENT_DATE);
insert into favorite values ('britney','Mike', CURRENT_DATE);
insert into favorite values ('Supreme Leader','Najulah', CURRENT_DATE);
insert into favorite values ('Supreme Leader','Yi Meng', CURRENT_DATE);
insert into favorite values ('Supreme Leader','selena', CURRENT_DATE);
insert into favorite values ('Supreme Leader','Mike', CURRENT_DATE);
insert into favorite values ('Yi Meng','Najulah', CURRENT_DATE);
insert into favorite values ('Yi Meng','justin', CURRENT_DATE);
insert into favorite values ('Yi Meng','selena', CURRENT_DATE);
insert into favorite values ('Yi Meng','Mike', CURRENT_DATE);
insert into favorite values ('Yi Meng','Supreme Leader', CURRENT_DATE);
insert into favorite values ('Yi Meng','britney', CURRENT_DATE);




create table account (
    username varchar(30),
    password varchar(30) 
);

-- insert into account values ('selena', '$2y$10$nCVWx9eeRgyeZ4LorSzaQ.HwBobAzeq7xQJn9TM8lIYgG7iKtEMOi');
-- insert into account values ('justin', '$2y$10$ZmU8wM5z8tP2OT/bKB/49e7tfAHFHMMY/SSAtU801eE8WGPJEG2jG');
-- insert into account values ('britney', '$2y$10$dd4R2jMngBKukYXhBhkCzO2AEviki5TZjT.degywfBYJQVqfF8nJu');

insert into account values ('selena', 'selena123');
insert into account values ('justin', 'justin123');
insert into account values ('britney', 'britney123');