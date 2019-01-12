package tv.codely.elastic_stack_example;

import static org.junit.jupiter.api.Assertions.assertEquals;

import org.apache.logging.log4j.LogManager;
import org.apache.logging.log4j.Logger;
import org.junit.jupiter.api.Test;

public class GreeterShould {

	@Test
	void greet_with_a_hello_message_to_the_name_it_receives() {

		Logger logger = LogManager.getLogger(GreeterShould.class);
		RuntimeException error = new RuntimeException("exceptioooon");
		logger.error("Hello error world!", error);

		Greeter greeter = new Greeter();
		assertEquals("Hello Jhon", greeter.greet("Jhon"));
	}
}
