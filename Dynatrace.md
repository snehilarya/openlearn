# Dynatrace


## Getting access to Dynatrace

You can use this link to get CAM access one of Dynatrace Account based on your need.

https://saphealthengineering.cfapps.eu10.hana.ondemand.com/operational/monitoring/dynatrace/#sap-health-dynatrace-accounts

  - Get access to SAP Health Dynatrace (Canary) for SAP Health development and pipeline monitoring.
  - Get access to SAP Health Dynatrace (EU10) for all SAP Health prod accounts monitoring.

**Note: EU10 access is only for monitoring prod applications use canary for any personal testing.**  

## Get Environment ID and PaaS-Token from Dynatrace

Once you have access to Canary Account you can follow below steps for monitoring your space.

The Dynatrace Agent is downloaded from the Dynatrace cluster during the application staging phase (via the buildpack). For this to work you need to pass the cluster hostname, the environment ID and a PaaS token to the application, so that the agent can be downloaded from the correct cluster. 

1. In your Dynatrace environment click on "Dynatrace Hub" in the left navigation bar.
2. Under "Cloud and container platforms" click on the "Cloud Foundry" tile.
3. Click on "Set up Cloud Foundry integration" at the bottom of the page.
3. Copy the Environment ID and save it in some text file.
4. Click "Generate new token".
5. Give the token a name (e.g. "mytoken") and click "Generate".
6. Copy the token and save it in the text file from before.

## Create a user-provided service in Cloud Foundry

In this step you will create a user-provided service containing the cluster hostname, environment ID and PaaS token from the previous steps.

**Note For Windows: Open Git Bash to execute the following commands.**

1. Login to Cloud Foundry space you want to monitor (using cf login).
2. Create a user provided service by executing the following commands:

**Note: Replace `<environmentUUID>` and `<token>` (in the first two lines) with the values saved from the previous step and `D/I number` with your D/I number**  
  
   ```
   export environmentid=<Environment ID>
   export apitoken=<PaaS-Token>
   export hostname=apm.cf.sap.hana.ondemand.com/e/522b4577-0b94-4b49-9b28-643569b59825
   cf cups dynatrace-service-<D/I number> -p '{"environmentid":"'$environmentid'","apitoken":"'$apitoken'","apiurl":"https://'$hostname'/e/'$environmentid'/api"}'
   ```

**Note: It is important that the service name contains "dynatrace" otherwise the buildpack integration doesn't work.**

## Bind the service to your app

By binding the previously created service to app, you make the Dynatrace credentials accessible to the application as environment variables. 

**Note: Replace `D/I number` with your D/I number**  
          
1. In your cf space, check that the application is deployed via `cf apps`.
2. Bind the service to your app with `cf bind-service <app-name> dynatrace-service-<D/I number>`.
3. Restage the app via `cf restage <app-name>`.

### Execute some requests against your app

## Explore in Dynatrace

### Hosts

Host performance is tracked across multiple Dynatrace pages, beginning with high-level health metrics on the home dashboard and extending down to dedicated pages for each of your hosts.

Individual Host pages show problem history, event history, and related processes for each host. To assess health, the following performance metrics are captured for each host and presented on each Host overview page:

- CPU
- Memory
- Disk (storage health)
- NIC (network health)
- Network services (currently, DNS performance)

![image](https://user-images.githubusercontent.com/25520466/127394120-b8ea3eeb-d5a8-415e-81d0-87c93697cc96.png)

### Process Groups (Technologies)

Dynatrace automatically merges related processes into process groups. A “process group” is a logical cluster of processes that belong to the same application or deployment unit and perform the same function across multiple hosts.

The Technology overview page provides a consolidated overview of the health and performance of all monitored technologies in your environment. To access the Technology overview page, select Technologies from the navigation menu.

In the example below, there is a Java process group that's composed of 2 process group instances. This process group has periodic CPU consumption spikes, with one of the process group instances consuming 39% of CPU while the same processes on another machine are consuming only 1.68% of available CPU.

![image](https://user-images.githubusercontent.com/25520466/127394785-a5e00785-8bcc-428c-b806-1ce3e1369581.png)

Select Process group details to access process group view, which includes comprehensive metric categories, such as:

- System performance (memory and CPU),
- Networking (connectivity and retransmissions),
- Technology-specific metrics (GC time, suspension).
- Log files

### Transactions and services

Dynatrace monitors all of your application's services, processes, and infrastructure. By evaluating all such components collectively, Dynatrace is able to pinpoint exactly how each service contributes to the performance of your application.

In this view you can monitor all services that are making request to your application. As the full list might be rather lengthy, some quick filters are provided. Apart from quick filters you can use the advanced filtering in the Filter by field. Place your cursor in the field to see the filtering possibilities. Criteria of the same type are grouped by OR logic. Criteria of different types are grouped by AND logic.

![image](https://user-images.githubusercontent.com/25520466/127404808-29145e12-a823-4442-8daa-34106b8fd01f.png)

Once you've found the service that you're interested in, select it to go to its dedicated Service page. Each Service page lists the most important information for that service. The service infographic shows you which applications or services use the service and if the service makes any calls to other services or databases.

Each tile of the Service infographic serves as a link you can click to view greater detail, such as specifics regarding inter-service communication. For example, to access processes and hosts that run the service, select the technology icon in the middle of the service infographic.

![image](https://user-images.githubusercontent.com/25520466/127405296-1a084d84-2d82-4b46-9d3f-f1fa48bd3ccb.png)

### Dynamic requests 

The Dynamic web requests pane shows various aspects of the service's request performance:

- Median response time
- Average failure rate over the current timeframe
- Average CPU consumption per request
- Average throughput over the current timeframe

### Problems 

Active and closed problems that impact this service. Select a problem to see the root cause and understand the impact on your services. To find out how Dynatrace detects problems, see Problem detection and analysis.

### Current hotspots 

The Current hotspots pane is dynamic and automatically displays the most important hotspots in your service, such as:
- Highest failure rate request
- Highest resource-consuming requests
- Slowest requests
- Select any hotspot entry to begin deeper analysis.

### Multidimensional analysis views 

The Multidimensional analysis view enables you to analyze web requests of your services with fine-tuned filtering, so you can focus your analysis on the dimensions that matter most. This view is easily configurable and serves as a convenient entry point for in-depth analysis of your services.

### Dependencies 

Contains shortcuts for various options for dependency analysis.

![image](https://user-images.githubusercontent.com/25520466/127406298-987abd2f-a5ad-4c18-bc69-8fc48e9add92.png)

- #### Service flow:

  Dynatrace understands your applications’ transactions from end to end. This transactional insight is visualized through Service flow, which illustrates the sequence of service calls that are triggered by each service request in your environment. With service flow, you see the flow of service calls from the perspective of a single service, request or their filtered subset. Along with the specific services that are triggered, you can also see how each component of a request contributes to the overall response time.
  
  ![image](https://user-images.githubusercontent.com/25520466/127406071-5e5e5ba5-37b1-42e0-b16e-917cec2ac4c4.png)
  
- #### Service backtrace:

  More than just knowing which service directly calls one of your services, it's helpful to know the sequence of service calls that leads up to each request—all the way back up to the browser click that triggered the sequence of calls. Dynatrace Service-level backtrace can show you such call sequences.
  
  ![image](https://user-images.githubusercontent.com/25520466/127406128-8b1a146a-8c60-4562-bc6b-ba20916e6e5f.png)


- #### PurePaths:

  Through PurePath technology, Dynatrace enables you to efficiently find the proverbial needle in the haystack and focus on those few requests (out of tens of thousands) that you’re interested in. You can view requests from multiple vantage points—from the perspective of the services you’re responsible for or from the point of view of where a request originates in your system.
  
  ![image](https://user-images.githubusercontent.com/25520466/127406368-068901c4-15e4-436d-bb82-fc92699080d7.png)

- #### Top web requests

  The highly flexible Top web requests view enables you to analyze the top web requests across all your services and to look for requests that originate from or are destined to specific URLs. This view is easily configurable and serves as a convenient entry point for in-depth analysis of your services.

  ![image](https://user-images.githubusercontent.com/25520466/127406447-bb382716-05f8-4aba-abad-64b9da62505b.png)


### Events 
Contains a list of events that affect the service in the current timeframe.
![image](https://user-images.githubusercontent.com/25520466/127406934-97b4efb1-7180-4fed-8a58-ce31924f0996.png)


### Reference

Documentation - https://www.dynatrace.com/support/help/how-to-use-dynatrace/

Training Videos - https://teams.microsoft.com/_#/files/19%3Af650643b92924d62afffe0e56d78048b%40thread.skype?threadId=19%3Af650643b92924d62afffe0e56d78048b%40thread.skype&ctx=channel&context=Dynatrace&rootfolder=%252Fteams%252Fteam-minions2%252FShared%2520Documents%252Fhow%2520to%2520train%2520the%2520minions%252FDynatrace&isTeamLevelApp=false

