<h2>Hello {{ $user->name }}</h2>

<h5>Welcome to TechBlog</h5>

<p>Thank you for registering in our website I hope to enjoy it.</p>

<p>Verify You account by Clicking this link </p><br>

<a href="{{url('user/verify', $user->verification_token) }}">Verify Email</a>