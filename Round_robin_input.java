/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package round_robin_input;

import java.util.Scanner;

/**
 *
 * @author Tanbeer
 */
import java.util.*;
class RR
{
            Scanner sc=new Scanner(System.in);
            int[] bur,rem,wai,ta;
            int size,q,b=0,t=0,flag=0;
            RR(int size)
            {
                        this.size=size;
                        bur=new int[size];
                        wai=new int[size];
                        ta=new int[size];
                        rem=new int[size];
            }
            void get()
            {
                        for(int i=0;i<size;i++)
                        {
                                    System.out.print("Enter burst time of P"+(i+1)+":");
                                    bur[i]=rem[i]=sc.nextInt();
                        }
                        System.out.print("Enter quantum time:");
                        q=sc.nextInt();
            }
            void round()
            {
                        do{
                                    flag=0;
                                    for(int i=0;i<size;i++)
                                    {
                                                if(rem[i]>=q)
                                                {
                                                            System.out.print("P"+(i+1)+"\t");
                                                            for(int j=0;j<size;j++)
                                                            {
                                                                        if(j==i)
                                                                                    rem[i]=rem[i]-q;
                                                                        else if(rem[j]>0)
                                                                                    wai[j]+=q;
                                                            }
                                                }
                                                else if(rem[i]>0)
                                                {
                                                            System.out.print("P"+(i+1)+"\t");
                                                            for(int j=0;j<size;j++)
                                                            {
                                                                        if(j==i)
                                                                                    rem[i]=0;
                                                                        else if(rem[j]>0)
                                                                                    wai[j]+=rem[i];
                                                            }
                                                }
                                    }
                                    for(int i=0;i<size;i++)
                                                if(rem[i]>0)
                                                            flag=1;
                        }while(flag==1);
                        for(int i=0;i<size;i++)
                                    ta[i]=wai[i]+bur[i];
            }
            void display()
            {
                        System.out.println("\nProcess\tBurst\tWaiting\tTurnaround");
                        for(int i=0;i<size;i++)
                        {
                                    System.out.println("P"+(i+1)+"\t"+bur[i]+"\t"+wai[i]+"\t"+ta[i]);
                                    b+=wai[i];
                                    t+=ta[i];
                        }
                        System.out.println("Average waiting time:"+(b/size));
                        System.out.println("Average Turnaround time:"+(t/size));
            }
}
class Round_robin_input
{
            public static void main(String arg[])
            {
                        Scanner s=new Scanner(System.in);
                        System.out.print("Enter the no of process:");
                        int n=s.nextInt();
                        RR obj = new RR(n);
                        obj.get();
                        obj.round();
                        obj.display();
            }
}