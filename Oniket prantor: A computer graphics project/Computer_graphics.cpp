
#include <stdio.h>
#include <iostream>
#include <GL/glut.h>
#include <math.h>
#include <windows.h>
#include <mmsystem.h>
#include <algorithm>

using namespace std;
int carStatus = 0;
int carStatus1 = 0;

int meghStatus = 1;
int sunStatus =  1;



float in=2;
float sunX = 0;
float sunY = 350;

float meghX = 0;
float meghY = 0;

float hillx=0;
float hilly=0;

float treex=0;
float treey=0;
float grassx=0;
float grassy=0;

float move, angle;
void grass();

		void DrawCircle(float cx, float cy, float r, int num_segments){

		 glBegin(GL_TRIANGLE_FAN);
		for (int i = 0; i < num_segments; i++)
		{
		float theta = 2.0f * 3.1415926f * float(i) / float(num_segments);//get the current angle

		float x = r * cosf(theta);//calculate the x component
		float y = r * sinf(theta);//calculate the y component

		glVertex2f(x + cx, y + cy);//output vertex

		}
		glEnd();
	}

	void drawSun(int x)
	{
        glColor3f(1.0, 0.8, 0.5);
		DrawCircle(800, 1000, 70, 1000);
        glColor3f(1.0, 0.85, 0.5);
		DrawCircle(800, 1000, 60, 1000);
		glColor3f(1.0, 0.9, 0.5);
		DrawCircle(800, 1000, 50, 1000);
        glColor3f(1.0, 0.95, 0.5);
		DrawCircle(800, 1000, 40, 1000);
        glColor3f(1.0, 1.0, 0.5);
		DrawCircle(800, 1000, 30, 1000);
	}



	void hills(int x){

		glColor3f(0.4, 0.4, 0.2);
		DrawCircle(200, 600, 500, 2000); //1
        glColor3f(0.35, 0.35, 0.2);
		DrawCircle(200, 600, 500-x, 2000); //1shadow
        glColor3f(0.3, 0.3, 0.2);
		DrawCircle(200, 600, 500-2*x, 2000); //1shadow
		glColor3f(0.4, 0.4, 0.2);
		DrawCircle(800,600,500, 2000);//2

		glColor3f(0.35, 0.35, 0.2);
		DrawCircle(800,600,500-x, 2000);//2
		glColor3f(0.3, 0.3, 0.2);
		DrawCircle(800,600,500-2*x, 2000);//2

		glColor3f(0.4, 0.4, 0.2);
		DrawCircle(1400, 600, 500, 2000);//3
		glColor3f(0.35, 0.35, 0.2);
		DrawCircle(1400, 600, 500-x, 2000);//3
        glColor3f(0.3, 0.3, 0.2);
		DrawCircle(1400, 600, 500-2*x, 2000);//3

		glColor3f(0.4, 0.4, 0.2);
		DrawCircle(2000, 600, 500, 2000);//4

		glColor3f(0.35, 0.35, 0.2);
		DrawCircle(2000, 600, 500-x, 2000);//4
		glColor3f(0.3, 0.3, 0.2);
		DrawCircle(2000, 600, 500-2*x, 2000);//4

	}

	void megh(int x){


	glColor3f(1.0, 1.0, 1.0);
	DrawCircle(-100, 1300, 60, 2000);//1
	DrawCircle(-200,1300, 80, 2000);//2
	DrawCircle(-300, 1300, 55, 2000);//3
     //megh1
	glColor3f(1.0, 1.0, 1.0);
	DrawCircle(100, 1300, 60, 2000);//1
	DrawCircle(200,1300, 80, 2000);//2
	DrawCircle(300, 1300, 55, 2000);//3
  //megh1shadow
	glColor3f(0.9, 0.9, 1.0);
	DrawCircle(100, 1300, 60-x, 2000);//1
	DrawCircle(200,1300, 80-x, 2000);//2
	DrawCircle(300, 1300, 55-x, 2000);//3
	//megh2
		glColor3f(1.0, 1.0, 1.0);
	DrawCircle(700, 1300, 60, 2000);//1
	DrawCircle(800,1300, 80, 2000);//2
	DrawCircle(900, 1300, 55, 2000);//3
	//megh2shadow
        glColor3f(0.9, 0.9, 1.0);
   	DrawCircle(700, 1300, 60-x, 2000);//1
	DrawCircle(800,1300, 80-x, 2000);//2
	DrawCircle(900, 1300, 55-x, 2000);//3

	//megh3
		glColor3f(1.0, 1.0, 1.0);
	DrawCircle(1100, 1300, 60, 2000);//1
	DrawCircle(1200,1300, 80, 2000);//2
	DrawCircle(1300, 1300, 55, 2000);//3

	//megh3shadow
		glColor3f(0.9, 0.9, 1.0);
	DrawCircle(1100, 1300, 60-x, 2000);//1
	DrawCircle(1200,1300, 80-x, 2000);//2
	DrawCircle(1300, 1300, 55-x, 2000);//3
	//megh4
       glColor3f(1.0, 1.0, 1.0);
	DrawCircle(1700, 1300, 60, 2000);//1
	DrawCircle(1800,1300, 80, 2000);//2
	DrawCircle(1900, 1300, 55, 2000);//3
    //megh4shadow
       glColor3f(0.9, 0.9, 1.0);
	DrawCircle(1700, 1300, 60-x, 2000);//1
	DrawCircle(1800,1300, 80-x, 2000);//2
	DrawCircle(1900, 1300, 55-x, 2000);//3



	}

	void movemegh()

	{
		if (meghStatus == 1)
		{
			meghX +=.5;
		}
		if (meghX>2000)
		{
			meghX = -200;
		}
		glPushMatrix();
		glTranslatef(meghX, meghY, 0);
		megh(12);
		glPopMatrix();
        glPushMatrix();
		glTranslatef(meghX-2000, meghY, 0);
		megh(12);
		glPopMatrix();

	}

	void moveSun()
	{


		 if(sunStatus == 1)
		  {
				 if (sunY>=350)
				 sunY=350;
				 else
					sunY += .5;
		  }

			  glPushMatrix();

			 glTranslatef(sunX, sunY, 0);

     		 drawSun(1);
			 glPopMatrix();


	}
    void movehill()
    {
			hillx +=1;
		if (hillx>2000)
		{
			hillx = -200;
		}
		glPushMatrix();
		glTranslatef(hillx, hilly, 0);
		hills(50);
		glPopMatrix();
        glPushMatrix();
		glTranslatef(hillx-2500, hilly, 0);
		hills(50);
		glPopMatrix();

    }
	void sky(){

	glBegin(GL_POLYGON); //Sky
	glColor3f(0.4, 0.5, 1.0);
	glVertex2i(0, 1500);
	glVertex2i(2000, 1500);
	glColor3f(0.7, 0.7, 1.0);
	glVertex2i(2000, 0);
	glVertex2i(0, 0);
	glEnd();



	}
	void road(){



    glEnd();
	glBegin(GL_POLYGON); // road
	glColor3f(98, 131, 110);
	glVertex2i(0, 400);
	glVertex2i(2000, 400);
	glVertex2i(2000, 900);
	glVertex2i(0, 900);
	glEnd();

	glBegin(GL_POLYGON); // road
	glColor3f(0.0, 0.0, 0.0);
	glVertex2i(0, 450);
	glVertex2i(2000, 450);
	glVertex2i(2000, 850);
	glVertex2i(0, 850);
	glEnd();



	}
	void ground()
	{
	    glBegin(GL_POLYGON); //Middle ground
	glColor3f(0.1, 0.6, 0.0);
	glVertex2i(0, 0);
	glVertex2i(2000,0);
	glVertex2i(2000, 400+500);
	glVertex2i(0,400+500);
	glEnd();
	}
	void tree(int y)
	{

	//tree1
   float a=.5;
   for(int i=-1200;i<2500;i+=300)
   {

		glBegin(GL_POLYGON);
		glColor3f(0.4, 0.3, 0.0);
		glVertex2i(450*a+i,100*a+y);
		glVertex2i(480*a+i,100*a+y);
		glVertex2i(480*a+i, 300*a+y);
		glVertex2i(450*a+i,300*a+y);
		glEnd();


		glBegin(GL_POLYGON);
		glColor3f(0.0, 0.2, 0.1);
		glVertex2i(380*a+i,200*a+y);
		glVertex2i(560*a+i,200*a+y);
		glVertex2i(460*a+i,400*a+y);
		glEnd();

		glBegin(GL_POLYGON);
		glColor3f(0.0, 0.2, 0.1);
		glVertex2i(380*a+i,250*a+y);
		glVertex2i(560*a+i,250*a+y);
		glVertex2i(460*a+i,450*a+y);
		glEnd();

		glBegin(GL_POLYGON);
		glColor3f(0.0, 0.2,0.1);
		glVertex2i(380*a+i,300*a+y);
		glVertex2i(560*a+i,300*a+y);
		glVertex2i(460*a+i,500*a+y);
		glEnd();
   }
//tree2
/*
		glBegin(GL_POLYGON);
		glColor3f(0.4, 0.3, 0.0);
		glVertex2i(1070,100+x);
		glVertex2i(1100,100+x);
		glVertex2i(1100, 300+x);
		glVertex2i(1070,300+x);
		glEnd();


		glBegin(GL_POLYGON);
		glColor3f(0.0, 0.2, 0.1);
		glVertex2i(1000,200+x);
		glVertex2i(1180,200+x);
		glVertex2i(1080,400+x);
		glEnd();




		glBegin(GL_POLYGON);
		glColor3f(0.0, 0.2, 0.1);
		glVertex2i(1000,250+x);
		glVertex2i(1180,250+x);
		glVertex2i(1080,450+x);
		glEnd();



		glBegin(GL_POLYGON);
		glColor3f(0.0, 0.2, 0.1);
		glVertex2i(1000,300+x);
		glVertex2i(1180,300+x);
		glVertex2i(1080,500+x);
		glEnd();






//tree3

		glBegin(GL_POLYGON);
		glColor3f(0.4, 0.3, 0.0);
		glVertex2i(1680,100+x);
		glVertex2i(1710,100+x);
		glVertex2i(1710, 300+x);
		glVertex2i(1680,300+x);
		glEnd();


		glBegin(GL_POLYGON);
		glColor3f(0.0, 0.2, 0.1);
		glVertex2i(1610,200+x);
		glVertex2i(1790,200+x);
		glVertex2i(1690,400+x);
		glEnd();




		glBegin(GL_POLYGON);
		glColor3f(0.0, 0.2, 0.1);
		glVertex2i(1610,250+x);
		glVertex2i(1790,250+x);
		glVertex2i(1690,450+x);
		glEnd();



		glBegin(GL_POLYGON);
		glColor3f(0.0, 0.2, 0.1);
		glVertex2i(1610,300+x);
		glVertex2i(1790,300+x);
		glVertex2i(1690,500+x);
		glEnd();
*/
	}

	void house(int y){



	//house1
	float a=0.25;
	 for(int i=-1200;i<2500;i+=300)
   {
	glBegin(GL_POLYGON); //House rec
	glColor3f(0.5, 0.2, 0.1);
	glVertex2i(100*a+i, 100*a+y);
	glVertex2i(350*a+i, 100*a+y);
	glVertex2i(350*a+i, 670*a+y);
	glVertex2i(100*a+i, 670*a+y);
	glEnd();

    glBegin(GL_POLYGON); //House door
	glColor3f(0.2, 0.2, 0.1);
	glVertex2i(200*a+i, 100*a+y);
	glVertex2i(250*a+i, 100*a+y);
	glVertex2i(250*a+i, 200*a+y);
	glVertex2i(200*a+i, 200*a+y);
	glEnd();

	glBegin(GL_POLYGON); //House vender1l
	glColor3f(0.2, 0.2, 0.1);
	glVertex2i(125*a+i, 200*a+y);
	glVertex2i(150*a+i, 200*a+y);
	glVertex2i(150*a+i, 240*a+y);
	glVertex2i(125*a+i, 240*a+y);
	glEnd();
	glBegin(GL_POLYGON); //House vender2l
	glColor3f(0.2, 0.2, 0.1);
	glVertex2i(125*a+i, 300*a+y);
	glVertex2i(150*a+i, 300*a+y);
	glVertex2i(150*a+i, 340*a+y);
	glVertex2i(125*a+i, 340*a+y);
	glEnd();

	glBegin(GL_POLYGON); //House vender3l
	glColor3f(0.2, 0.2, 0.1);
	glVertex2i(125*a+i, 400*a+y);
	glVertex2i(150*a+i, 400*a+y);
	glVertex2i(150*a+i, 440*a+y);
	glVertex2i(125*a+i, 440*a+y);
	glEnd();

    glBegin(GL_POLYGON); //House vender4l
	glColor3f(0.2, 0.2, 0.1);
	glVertex2i(125*a+i, 500*a+y);
	glVertex2i(150*a+i, 500*a+y);
	glVertex2i(150*a+i, 540*a+y);
	glVertex2i(125*a+i, 540*a+y);
	glEnd();

	glBegin(GL_POLYGON); //House vender 5l
	glColor3f(0.2, 0.2, 0.1);
	glVertex2i(125*a+i, 600*a+y);
	glVertex2i(150*a+i, 600*a+y);
	glVertex2i(150*a+i, 640*a+y);
	glVertex2i(125*a+i, 640*a+y);
	glEnd();



    glBegin(GL_POLYGON); //House vender1r
	glColor3f(0.2, 0.2, 0.1);
	glVertex2i(300*a+i, 200*a+y);
	glVertex2i(325*a+i, 200*a+y);
	glVertex2i(325*a+i, 240*a+y);
	glVertex2i(300*a+i, 240*a+y);
	glEnd();

	glBegin(GL_POLYGON); //House vender2r
	glColor3f(0.2, 0.2, 0.1);
	glVertex2i(300*a+i, 300*a+y);
	glVertex2i(325*a+i, 300*a+y);
	glVertex2i(325*a+i, 340*a+y);
	glVertex2i(300*a+i, 340*a+y);
	glEnd();

	glBegin(GL_POLYGON); //House vender3r
	glColor3f(0.2, 0.2, 0.1);
	glVertex2i(300*a+i, 400*a+y);
	glVertex2i(325*a+i, 400*a+y);
	glVertex2i(325*a+i, 440*a+y);
	glVertex2i(300*a+i, 440*a+y);
	glEnd();


	glBegin(GL_POLYGON); //House vender4r
	glColor3f(0.2, 0.2, 0.1);
	glVertex2i(300*a+i, 500*a+y);
	glVertex2i(325*a+i, 500*a+y);
	glVertex2i(325*a+i, 540*a+y);
	glVertex2i(300*a+i, 540*a+y);
	glEnd();
	glBegin(GL_POLYGON); //House vender5r
	glColor3f(0.2, 0.2, 0.1);
	glVertex2i(300*a+i, 600*a+y);
	glVertex2i(325*a+i, 600*a+y);
	glVertex2i(325*a+i, 640*a+y);
	glVertex2i(300*a+i, 640*a+y);
	glEnd();
	}



/*

    glBegin(GL_POLYGON); //Grass2
	glColor3f(0.0, 0.6, 0.1);
	glVertex2i(1135, 100);
	glVertex2i(1120, 120);
	glVertex2i(1110, 130);
	glVertex2i(1130, 120);
	glVertex2i(1120, 150);
	glVertex2i(1140, 130);
	glVertex2i(1145, 170);
	glColor3f(0.8, 0.8, 0.1);
	glVertex2i(1150, 130);
	glVertex2i(1170, 150);
	glVertex2i(1160, 120);
	glVertex2i(1180, 130);
	glVertex2i(1170, 120);
	glVertex2i(1155, 100);
	glEnd();
	glBegin(GL_POLYGON); //Grass3
	glColor3f(0.0, 0.6, 0.1);
	glVertex2i(1835, 100);
	glVertex2i(1820, 120);
	glVertex2i(1810, 130);
	glVertex2i(1830, 120);
	glVertex2i(1820, 150);
	glVertex2i(1840, 130);
	glVertex2i(1845, 170);
	glColor3f(0.8, 0.8, 0.1);
	glVertex2i(1850, 130);
	glVertex2i(1870, 150);
	glVertex2i(1860, 120);
	glVertex2i(1880, 130);
	glVertex2i(1870, 120);
	glVertex2i(1855, 100);
	glEnd();

    glBegin(GL_POLYGON); //Grass3
	glColor3f(0.0, 0.6, 0.1);
	glVertex2i(1935, 100);
	glVertex2i(1920, 120);
	glVertex2i(1910, 130);
	glVertex2i(1930, 120);
	glVertex2i(1920, 150);
	glVertex2i(1940, 130);
	glVertex2i(1945, 170);
	glColor3f(0.8, 0.8, 0.1);
	glVertex2i(1950, 130);
	glVertex2i(1970, 150);
	glVertex2i(1960, 120);
	glVertex2i(1980, 130);
	glVertex2i(1970, 120);
	glVertex2i(1955, 100);
	glEnd();
*/
}
    void movetree()
    {
			treex +=in;
		if (treex>2000)
		{
			treex = -200;
		}

		glPushMatrix();
		glTranslatef(treex, treey, 0);
		tree(850);
		glPopMatrix();

        		glPushMatrix();
		glTranslatef(treex, treey, 0);
		house(870);
		glPopMatrix();

			glPushMatrix();
		glTranslatef(treex-1200, treey, 0);
		tree(850);
		glPopMatrix();
      			glPushMatrix();
		glTranslatef(treex-1200, treey, 0);
		house(870);
		grassx+=in;
		if(grassx>1000)
            grassx=0;
		glPopMatrix();
		glPushMatrix();
		glTranslatef(grassx-1000, 0, 0);
		grass();
		glPopMatrix();
       in+=0.001;
       in=min(in,100-in);
    }
void grass(){

int x,y;
float i=1,j=1,k=1;
//grass1
for(y=0;y<1400;y+=100)
    {
    for(x=-7;x<8000;x+=70)
	{glBegin(GL_POLYGON); //Grass
	glColor3ub(1, 100, 1);
	glVertex2f(45*i+x*k, 110*i+y*j);
	glVertex2f(30*i+x*k, 130*i+y*j);
	glVertex2f(20*i+x*k, 140*i+y*j);
	glVertex2f(40*i+x*k, 130*i+y*j);
	glVertex2f(30*i+x*k, 160*i+y*j);
	glVertex2f(50*i+x*k, 130*i+y*j);
	glVertex2f(55*i+x*k, 180*i+y*j);
	glColor3ub(200, 220, 25);
	glVertex2f(60*i+x*k, 140*i+y*j);
	glVertex2f(80*i+x*k, 160*i+y*j);
	glVertex2f(70*i+x*k, 130*i+y*j);
	glVertex2f(90*i+x*k, 140*i+y*j);
	glVertex2f(80*i+x*k, 130*i+y*j);
	glVertex2f(65*i+x*k, 110*i+y*j);
	glEnd();}
	i=i-0.07;
	j=j-0.025;
	k=k-0.04;
	}


}

void keyboard(unsigned char key,int x,int y)

	{

		if(key=='1')
	   {		               //car start
	    carStatus = 1;

		}


		else if(key== '2')
			//car stop
		{
			carStatus = 0;

		}



		else if(key== '3')		//car1 start

		 {	 carStatus1 = 1;

		}

		else if(key=='4')
			//car1 stop
		{
			carStatus1 = 0;

		}

		else if( key =='S'|| key=='s')		//sun start
		{
			sunStatus = 1;
	    }

		else if( key =='N'|| key=='n')		//sun  start
		{
			sunStatus = 0;
		}

		else if( key =='C'|| key=='c')
			//megh start
		{
			meghStatus = 1;
		}
		else if( key =='e'|| key=='N')
			//megh start
		{
			meghStatus = 0;
	}
		else{

		}



	}
void face()
{
    float i=60,x=370,y=0;
    glBegin(GL_POLYGON);
	glColor3ub(150, 100, 30);  //borka
	glVertex2f(16.71*i+x, 1.68*i+y);
	glVertex2f(25.17*i+x, 1.7*i+y);
	glVertex2f(21.99*i+x, 11.16*i+y);
	glVertex2f(19.29*i+x, 10.82*i+y);
	glEnd();
    glBegin(GL_POLYGON); //Grass
	glColor3ub(25, 25, 1);
	glVertex2f(22.35*i+x, 15.38*i+y);
	glVertex2f(19.8*i+x, 16.01*i+y);
	glVertex2f(18.47*i+x, 15.12*i+y);
	glVertex2f(18.43*i+x, 14.48*i+y);
	glVertex2f(21.29*i+x, 15*i+y);
	glEnd();
	 glBegin(GL_POLYGON); //Grass
	glColor3ub(25, 50, 1);
	glVertex2f(21.27*i+x, 10.68*i+y);
	glVertex2f(23.59*i+x, 10.86*i+y);
	glVertex2f(22.35*i+x, 15.38*i+y);
	glVertex2f(21.29*i+x, 15*i+y);
	glEnd();
	 glBegin(GL_POLYGON); //Grass
	glColor3ub(25, 25, 1);
	glVertex2f(20.81*i+x, 9.6*i+y);
	glVertex2f(22.55*i+x, 9.5*i+y);
	glVertex2f(22.35*i+x, 15.38*i+y);
	glVertex2f(21.29*i+x, 15*i+y);
	glEnd();

	 glBegin(GL_POLYGON); //nak
	glColor3ub(221, 190, 196);
	glVertex2f(18.09*i+x, 12.48*i+y);
	glVertex2f(18.55*i+x, 12.36*i+y);
	glVertex2f(18.53*i+x, 13.12*i+y);
	glEnd();
	glBegin(GL_POLYGON);
	glColor3ub(241, 190, 196);
	glVertex2f(18.55*i+x, 12.36*i+y);
	glVertex2f(18.53*i+x, 13.12*i+y);
	glVertex2f(19.11*i+x, 13.36*i+y);
	glEnd();
	glBegin(GL_POLYGON);
	glColor3ub(250, 250, 250); //chokh
	glVertex2f(18.53*i+x, 13.56*i+y);
	glVertex2f(18.53*i+x, 13.12*i+y);
	glVertex2f(19.11*i+x, 13.36*i+y);
	glEnd();
	glBegin(GL_POLYGON);
	glColor3ub(221, 170, 196);
	glVertex2f(19.11*i+x, 13.36*i+y);
	glVertex2f(18.55*i+x, 12.36*i+y);
	glVertex2f(18.41*i+x, 12.02*i+y);
	glVertex2f(19.25*i+x, 11.92*i+y);
	glEnd();
	glBegin(GL_POLYGON);
	glColor3ub(241, 190, 186);
	glVertex2f(19.11*i+x, 13.36*i+y);
	glVertex2f(19.25*i+x, 11.92*i+y);
	glVertex2f(19.65*i+x, 13.74*i+y);
	glEnd();
	glBegin(GL_POLYGON);
	glColor3ub(221, 210, 196);
	glVertex2f(19.65*i+x, 13.74*i+y);
	glVertex2f(18.43*i+x, 14.48*i+y);
	glVertex2f(18.53*i+x, 13.56*i+y);
	glVertex2f(19.11*i+x, 13.36*i+y);
	glEnd();
	glBegin(GL_POLYGON);
	glColor3ub(231, 200, 206);  //chinn
	glVertex2f(18.41*i+x, 11.68*i+y);
	glVertex2f(18.47*i+x, 11.26*i+y);
	glVertex2f(19.29*i+x, 10.82*i+y);
	glVertex2f(19.25*i+x, 11.92*i+y);
	glEnd();
	glBegin(GL_POLYGON);
	glColor3ub(231, 180, 176);  //chinnm-rvo
	glVertex2f(20.53*i+x, 11.8*i+y);
	glVertex2f(19.29*i+x, 10.82*i+y);
	glVertex2f(19.25*i+x, 11.92*i+y);
	glEnd();
	glBegin(GL_POLYGON);
	glColor3ub(211, 190, 196);  //rvs
	glVertex2f(20.53*i+x, 11.8*i+y);
	glVertex2f(19.29*i+x, 10.82*i+y);
	glVertex2f(20.93*i+x, 11*i+y);
	glEnd();
    glBegin(GL_POLYGON);
	glColor3ub(201, 190, 176);  //uvs
	glVertex2f(20.53*i+x, 11.8*i+y);
	glVertex2f(21.29*i+x, 15*i+y);
	glVertex2f(20.93*i+x, 11*i+y);
	glEnd();
	 glBegin(GL_POLYGON);
	glColor3ub(201, 180, 166);  //uvw
	glVertex2f(20.53*i+x, 11.8*i+y);
	glVertex2f(21.29*i+x, 15*i+y);
	glVertex2f(20.28*i+x, 13.03*i+y);
	glEnd();
	glBegin(GL_POLYGON);
	glColor3ub(201, 150, 196);  //uvw
	glVertex2f(20.53*i+x, 11.8*i+y);
	glVertex2f(19.25*i+x, 11.92*i+y);
	glVertex2f(20.28*i+x, 13.03*i+y);
	glEnd();
	 glBegin(GL_POLYGON);
	glColor3ub(191, 180, 156);  //uvb
	glVertex2f(19.65*i+x, 13.74*i+y);
	glVertex2f(21.29*i+x, 15*i+y);
	glVertex2f(20.28*i+x, 13.03*i+y);
	glEnd();

	glBegin(GL_POLYGON);
	glColor3ub(201, 160, 166);  //ubo
	glVertex2f(19.65*i+x, 13.74*i+y);
	glVertex2f(19.25*i+x, 11.92*i+y);
	glVertex2f(20.28*i+x, 13.03*i+y);
	glEnd();

	glBegin(GL_POLYGON);
	glColor3ub(181, 180, 186);  //bug
	glVertex2f(19.65*i+x, 13.74*i+y);
	glVertex2f(21.29*i+x, 15*i+y);
	glVertex2f(18.43*i+x, 14.48*i+y);
	glEnd();



	/*
	glVertex2f(18.41*i+x, 12.02*i+y);
	glVertex2f(19.25*i+x, 11.92*i+y);
	glVertex2f(19.65*i+x, 13.74*i+y);
	glVertex2f(18.43*i+x, 14.48*i+y);
	glVertex2f(18.53*i+x, 13.56*i+y);
	glVertex2f(18.53*i+x, 13.12*i+y);
	glVertex2f(18.09*i+x, 12.48*i+y);
	glEnd();
  */
}
void frame()
{
    glBegin(GL_POLYGON);
	glColor3ub(39, 92, 117);  //up
	glVertex2f(0,1600);
	glVertex2f(2000,1600);
	glVertex2f(1800, 1440);
	glVertex2f(200, 1440);
	glEnd();
	glBegin(GL_POLYGON);
	glColor3ub(39, 92, 117);  //down
	glVertex2f(0,0);
	glVertex2f(2000,0);
	glVertex2f(1800, 160);
	glVertex2f(200, 160);
	glEnd();
	glBegin(GL_POLYGON);
	glColor3ub(44, 127, 163);  //left
	glVertex2f(0,1600);
	glVertex2f(200, 1440);
	glVertex2f(200, 160);
	glVertex2f(0, 0);
	glEnd();

	glBegin(GL_POLYGON);
	glColor3ub(44, 127, 163);  //down
	glVertex2f(2000,0);
	glVertex2f(2000,1600);
	glVertex2f(1800, 1440);
	glVertex2f(1800, 160);
	glEnd();

}

   void myDisplay(void)
	{


	        //face();
			 sky();
			 moveSun();
			 movehill();

			 //road();
			// car();
			 //car1();
			 //house(80);
			 ground();

			 movemegh();
			 movetree();
			 //grass();
			 frame();
            face();

			 glFlush();
			 glutPostRedisplay();
			 glutSwapBuffers();
}

void myInit(void)
{
	glClearColor(0.0, 0.0, 1.0, 0.0);
	glColor3f(1.0f, 1.0f, 1.0f);
	glPointSize(0.0);
	glMatrixMode(GL_PROJECTION);
	glLoadIdentity();
	gluOrtho2D(0.0, 2000.0, 0.0, 1600.0);
}
int main(int argc, char** argv)
{

    PlaySound("oniket.wav", NULL, SND_FILENAME| SND_ASYNC);
	glutInit(&argc, argv);
	glutInitDisplayMode(GLUT_SINGLE | GLUT_RGB);
	glutInitWindowSize(2000, 1500);
	glutInitWindowPosition(0, 0);

	glutCreateWindow("Oniket prantor");
	glutDisplayFunc(myDisplay);
	myInit();
	glutMainLoop();
}
