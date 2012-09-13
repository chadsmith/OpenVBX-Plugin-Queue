# Queue for OpenVBX

This plugin adds &lt;Enqueue&gt;, &lt;Queue&gt;, &lt;Leave&gt; and &lt;Pause&gt; actions to OpenVBX to allow for call queues and other VBX awesomeness.

## Installation

[Download][1] the plugin and extract to /plugins

[1]: https://github.com/chadsmith/OpenVBX-Plugin-Queue/archives/master

## Usage

Once installed, Enqueue, Queue, Leave and Pause will appear in the applet sidebar along with Queue Stats and Conditional Leave.

Manage Queues from the OpenVBX sidebar or bridge incoming calls using the Queue applet.

### Send the call to a Queue

1. Add the Enqueue applet to your Call flow
2. Enter a Queue name
3. (Optional) Drop an applet for before the call is connected 
3. (Optional) Drop an applet for if/when the caller leaves the Queue 

### Dialing into a Queue

1. Add the Queue applet to your Call flow
2. Enter a Queue name
3. (Optional) Drop an applet for before the call is connected 

### Pausing a flow

1. Add the Pause applet to your Call flow
2. Enter the number of seconds to pause

### Leaving a Queue

1. Add the Leave applet to your Call flow

### Say the caller's current position or average wait time

1. Add the Queue Stats to your Call flow
2. Enter the message to read*
3. (Optional) Drop an applet for the next action

`*Use %position% to include the caller's position in the queue.
Use %size% to include the total size of the queue.
Use %time% to include the time the caller has been in the queue.
Use %average% to include the average wait time.`

### Leave the Queue if a condition is met
If the condition (time in queue, position in queue, average wait time, size of queue) is met the &lt;Leave&gt; verb will be sent and the caller will return to the Next action in the Enqueue applet.

1. Add the Conditional Leave applet to your Call flow
2. Enter the criteria to meet
3. (Optional) Drop an applet for if the condition is not met

### Manage Queues from OpenVBX sidebar

1. Click Call Queues in the OpenVBX Sidebar
2. Find the queue you want to manage
3. Click the number of calls in the queue
4. Select the Flow to redirect the call to
