trzeci([_,_,C|_],C).

porownaj([_,_,A,A|_]). 
zamien([A,B,C,D|R],X):- X=[A,B,D,C|R].

nalezy(X,[X|_]).
nalezy(X,[_|Yogon]) :-
	nalezy(X,Yogon).

dlugosc([],0).
dlugosc([_|Ogon],Dlug) :-
	dlugosc(Ogon,X),
	Dlug is X+1.

a2b([],[]).
a2b([a|Ta],[b|Tb]) :- 
   a2b(Ta,Tb).

sklej([],X,X).
sklej([X|L1],L2,[X|L3]) :-
	sklej(L1,L2,L3).

nalezy1(X,L) :-
	sklej(_,[X|_],L).


ostatni(X,L):-
	sklej(_,[X],L).

ostatni2(X,[X]).
ostatni2(X,[_|Y]):-ostatni2(X,Y).

dodaj(X,L,[X|L]).

usun(X,[X|Reszta],Reszta).
usun(X,[Y|Ogon],[Y|Reszta]) :-
	usun(X,Ogon,Reszta).

wstaw(X,L,Duza) :-
	usun(X,Duza,L).

nalezy2(X,L) :-
	usun(X,L,_).

zawiera(S,L) :-
	sklej(_,L2,L),
	sklej(S,_,L2).

permutacja([],[]).
permutacja([X|L],P) :-
	permutacja(L,L1),
	wstaw(X,L1,P).

permutacja2([],[]).
permutacja2(L,[X|P]) :-
	usun(X,L,L1),
	permutacja2(L1,P).

odwroc([],[]).
odwroc([H|T],L) :-
	odwroc(T,R),
	sklej(R,[H],L).

wypisz2(X):-
	string_to_list(X,L),
	wypisz(L).

wypisz([H|T]) :-
	put(H), wypisz(T).
wypisz([]).

plural(Noun, PL) :- 
	name(Noun, L), 
	name(s,T), 
	append(L,T, NL), 
	name(PL, NL).

odwroc2(L,R) :-
     odwr2(L,[],R).
odwr2([H|T],A,R) :-
     odwr2(T,[H|A],R).

odwr2([],A,A).



usun3pierwsze(L,L1):-
	sklej([_,_,_],L1,L).

usun3ostatnie(L,L1):-
	sklej(L1,[_,_,_],L).

usun3pierwszeiostatnie(L,L2):-
	sklej([_,_,_],L1,L),
	sklej(L2,[_,_,_],L1).

parzysta([]).
parzysta([_|T]):-nieparzysta(T). 
nieparzysta([_|T]):-parzysta(T).

palindrom(L):-
	odwroc(L,L).
	

przesun([H|T],L2):-
	sklej(T,[H],L2).

znaczy(0,zero).   znaczy(1,jeden).
znaczy(2,dwa).    znaczy(3,trzy).
znaczy(4,cztery). znaczy(5,piec).
znaczy(6,szesc).  znaczy(7,siedem).
znaczy(8,osiem).  znaczy(9,dziewiec).

przeloz([],[]).
przeloz([H|T],[H2|T2]):-
	znaczy(H,H2),
	przeloz(T,T2).

podzbior([],[]).
podzbior([H|T],[H|T2]):- podzbior(T,T2).
podzbior([_|T],L):-podzbior(T,L).

podziel(L,A,B):-
	parzysta(L),
	sklej(A,B,L),
	dlugosc(A,N),
	dlugosc(B,N).
podziel([H|T],A,B):-
	parzysta(T),
	sklej(C,B,T),
	dlugosc(C,N),
	dlugosc(B,N),
	sklej([H],C,A).
	
	
	
	
	
	

	
	

