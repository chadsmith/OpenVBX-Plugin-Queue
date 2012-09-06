# Queue for OpenVBX

This plugin adds <Enqueue>, <Queue>, <Leave> and <Pause> actions to OpenVBX to allow for call queues and other VBX awesomeness.

## Installation

[Download][1] the plugin and extract to /plugins

[1]: https://github.com/chadsmith/OpenVBX-Plugin-Queue/archives/master

## Usage

Once installed, Enqueue, Queue, Leave and Pause will appear in the OpenVBX sidebar. Use with the [Outbound Flows][2] plugin to connect outgoing calls to a queue.

[2]: https://github.com/chadsmith/OpenVBX-Plugin-Outbound/archives/master

### Send the call to a Queue

1. Add the Enqueue applet to your Call flow
2. Enter a Queue name
3. (Optional) Drop an applet for before the call is connected 
3. (Optional) Drop an applet for after the call ends 

### Dialing into a Queue

1. Add the Queue applet to your Call flow
2. Enter a Queue name
3. (Optional) Drop an applet for before the call is connected 

### Pausing a flow

1. Add the Pause applet to your Call flow
2. Enter the number of seconds to pause

### Leaving a Queue

1. Add the Leave applet to your Call flow
