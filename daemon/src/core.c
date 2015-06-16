/*
TRAFFICSQUEEZER provides dual licenses, designed to meet the usage and distribution requirements of different types of users.

GPLv2 License: Copyright (C) (2006-2014) Kiran Kankipati (kiran.kankipati@gmail.com) All Rights Reserved.
        
TrafficSqueezer is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License Version 2, and not any other version, as published by the Free Software Foundation. TrafficSqueezer is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.You should have received a copy of the GNU General Public License along with TrafficSqueezer; see the file COPYING. If not, write to the Free Software Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.

BSD License (2-clause license): Copyright (2006-2014) Kiran Kankipati. All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:
   1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
   2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY KIRAN KANKIPATI ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL KIRAN KANKIPATI OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

The views and conclusions contained in the software and documentation are those of the authors and should not be interpreted as representing official policies, either expressed or implied, of Kiran Kankipati.

* This license is applicable exclusive to the TrafficSqueezer components. TrafficSqueezer may bundle or include other third-party open-source components. Kindly refer these component README and COPYRIGHT/LICENSE documents, released by its respective authors and project/module owners.
** For more details about Third-party components, you can also kindly refer TrafficSqueezer project website About page.
*/
#include <sys/utsname.h>
#include "../inc/core.h"
#include "../inc/udp.h"

int ts_save_pid_file()
{
	char buff[300];
	remove("/var/ts_pid");
	sprintf(buff, "echo %d > /var/ts_pid", getpid());
	system(buff);
	return TRUE;
}

int check_ts_process_active()
{
    FILE *fp; 
    char buff[300];
    if(fp = fopen("/var/ts_pid", "r"))
	{
		while(fgets((char *)buff, 200, fp))
		{
			int process_id = atoi(buff);
			BYTE buff2[100];
     		sprintf(buff2, "/proc/%d", process_id);
     		if(dir_exists(buff2)==TRUE)
     		{
     			fclose(fp);
     			return TRUE;
     		}
     		else //PID file exists but not the /proc dir, seems it is a bogus or stray file, so delete it ! 
     		{
     			fclose(fp);
				system("rm -rf /var/ts_pid 2>/dev/null > /dev/null");
				return FALSE;
     		}
		}
		//PID file exists but not the /proc dir, seems it is a bogus or stray file, so delete it !
		fclose(fp);
        system("rm -rf /var/ts_pid 2>/dev/null > /dev/null");
		return FALSE;
    }
    return FALSE;
} /* check_ts_process_active */

//Check if file exists return 0/1
int file_exists(const char *filename)
{
	FILE *fp;
	if(fp = fopen(filename, "r"))
	{
		fclose(fp);
		return TRUE;
	}
	return FALSE;
} /* file_exists */

//Check if dir exists return 0/1
int dir_exists(const char *dirname)
{
	struct stat st;
	if(stat(dirname,&st) == 0)
	{
		return TRUE;	
	}
	return FALSE;
} /* dir_exists */

